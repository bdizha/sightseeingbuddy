####################################
# Migration tool
# Import and export files and dbs
###################################

# SSH connection details
set :ssh_host, "197.189.202.218"
set :ssh_user, "deploy"
set :ssh_pass, ""

# Remote root directory
set :remote_root, "/var/www/default2016"

# Database creds
set :db_name, "default2016"
set :db_prod_user, "default2016_usr"
set :db_prod_pass, ""

set :db_ssh_host, "#{ssh_host}" # rarely you will need to change this
set :db_ssh_user, "#{ssh_user}" # rarely you will need to change this

# Import files settings
set :source_folder, "deploy@#{ssh_host}:#{deploy_root}/static/uploads/."
set :destination_folder, "./public/uploads/."

set :source_folder2, "deploy@#{ssh_host}:#{deploy_root}/static/storage/userphotos/."
set :destination_folder2, "./craft/storage/userphotos/."

set :rsync_settings, "--max-size=5m" # avoid massive files

# Local environment settings - these should never change
# If you change them, you're going to mess other people around

set :local_db_user, "root"
set :local_db_pass, "rjfrank"
set :local_db_host, "127.0.0.1"


####################################################

# Set date to name files correctly

date = Time.new.strftime("%Y-%m-%d.%H.%M.%S")

# Migration scripts

namespace :migrate do

  task :import_db do

    logger.info "Making local dir ../db_dumps"
    system("mkdir -p ../db_dumps")

    logger.info "You may be prompted for the SSH password: #{ssh_pass}"

    logger.info "Making remote dir #{deploy_root}/db_dumps"
    system("ssh -t #{ssh_user}@#{db_ssh_host} \"mkdir #{deploy_root}/db_dumps\" ")

    logger.info "Dumping DB onto its server - but excluding exp_sessions so we don't get logged out"
    system("ssh -t #{ssh_user}@#{db_ssh_host} \"cd #{deploy_root}/db_dumps && mysqldump -u#{db_prod_user} -p#{db_prod_pass} --ignore-table=#{db_name}.exp_sessions #{db_name} | gzip > #{deploy_root}/db_dumps/#{db_name}.#{date}.remote.sql.gz \" ")

    logger.info "copying it locally"
    system("scp #{ssh_user}@#{db_ssh_host}:#{deploy_root}/db_dumps/#{db_name}.#{date}.remote.sql.gz ../db_dumps ")

    logger.info "creating DB - if it exists already, ignore error"
    system("mysql -u#{local_db_user} -p#{local_db_pass} -h#{local_db_host} -e \'create database #{db_name} \'")

    logger.info "backing up local DB"
    system("mysqldump -u#{local_db_user} -p#{local_db_pass} -h#{local_db_host} #{db_name} | gzip > ../db_dumps/#{db_name}.#{date}.local.sql.gz")

    logger.info "Extracting remote DB"
    system("gunzip ../db_dumps/#{db_name}.#{date}.remote.sql.gz")

    set :sed_phrase, 's/\\\"protocol\\\":\\\"smtp\\\"/\\\"protocol\\\":\\\"php\\\"/g'
    set :sed_command, "sed -i -e '#{sed_phrase}' ../db_dumps/#{db_name}.#{date}.remote.sql"

    logger.info "Search, replace DB"
    logger.info "#{sed_command}";
    system("#{sed_command}");
  
    logger.info "import DB"
    system("cat ../db_dumps/#{db_name}.#{date}.remote.sql | mysql -u#{local_db_user} -p#{local_db_pass} -h#{local_db_host} #{db_name}")

  end

# If someone wants to make this a parameter be my guest. The only change is removing the ignore table on mysqldump.

  task :import_db_full do

    logger.info "Making local dir ../db_dumps"
    system("mkdir ../db_dumps")

    logger.info "Making remote dir #{deploy_root}/db_dumps"
    system("ssh -t #{ssh_user}@#{db_ssh_host} \"mkdir #{deploy_root}/db_dumps\" ")

    logger.info "Dumping DB onto its server"
    system("ssh -t #{ssh_user}@#{db_ssh_host} \"cd #{deploy_root}/db_dumps && mysqldump -u#{db_prod_user} -p#{db_prod_pass} #{db_name} | gzip > #{deploy_root}/db_dumps/#{db_name}.#{date}.remote.sql.gz \" ")

    logger.info "copying it locally"
    system("scp #{ssh_user}@#{db_ssh_host}:#{deploy_root}/db_dumps/#{db_name}.#{date}.remote.sql.gz ../db_dumps ")

    logger.info "creating DB - if it exists already, ignore error"
    system("mysql -u#{local_db_user} -p#{local_db_pass} -h#{local_db_host} -e \'create database #{db_name} \'")

    logger.info "backing up local DB"
    system("mysqldump -u#{local_db_user} -p#{local_db_pass} -h#{local_db_host} #{db_name} | gzip > ../db_dumps/#{db_name}.#{date}.local.sql.gz")

    logger.info "import DB"
    system("gunzip < ../db_dumps/#{db_name}.#{date}.remote.sql.gz | mysql -u#{local_db_user} -p#{local_db_pass} -h#{local_db_host} #{db_name}")

  end


  task :export_db do

    logger.info "ensure there is a local DB dumps directory"
    system("mkdir -p ../db_dumps")

    logger.info "You may be prompted for the SSH password: #{ssh_pass}"

    logger.info "backing up local DB"
    system("mysqldump -u#{local_db_user} -p#{local_db_pass} #{db_name} | gzip > ../db_dumps/#{db_name}.#{date}.local.sql.gz")

    logger.info "Making remote dir #{deploy_root}/db_dumps"
    system("ssh -t #{ssh_user}@#{db_ssh_host} \"mkdir -p #{deploy_root}/db_dumps\" ")

    logger.info "copying it live server"
    system("scp  ../db_dumps/#{db_name}.#{date}.local.sql.gz #{db_ssh_user}@#{db_ssh_host}:#{deploy_root}/db_dumps/#{db_name}.#{date}.local.sql.gz")

    logger.info "Making courtesy backup of live server DB"
    system("ssh -t #{ssh_user}@#{db_ssh_host} \"cd #{deploy_root}/db_dumps && mysqldump -u#{db_prod_user} -p#{db_prod_pass} #{db_name} | gzip > #{deploy_root}/db_dumps/#{db_name}.#{date}.remote.sql.gz \" ")


    logger.info "Please note the file is now on the live server under: #{deploy_root}/db_dumps/#{db_name}.#{date}.local.sql.gz."
    logger.info "This is a destructive operation and will delete anything on the live production database."
    logger.info "Log onto the server using the following command"
    logger.info "ssh #{ssh_user}@#{db_ssh_host}"

    logger.info "Run the following command from #{deploy_root}/db_dumps/"
    logger.info "gunzip < #{db_name}.#{date}.local.sql.gz | mysql -u#{db_prod_user} -p#{db_prod_pass} #{db_name}"

  end


  task :import_files do

    puts "Please note the following settings:"
    puts "Source: #{source_folder}"
    puts "Destination: #{destination_folder}"
    puts "Do you want to proceed?"
      value = STDIN.gets[0..0] rescue nil
    exit unless value == 'y' or value == 'Y'

    logger.info "Assumes info is in static/uploads"

    system("rsync -av #{rsync_settings} #{source_folder} #{destination_folder}")
    system("rsync -av #{rsync_settings} #{source_folder2} #{destination_folder2}")

  end
  
  task :export_files do
  
    logger.info "You are wishing to rsync files to #{source_folder}"

    puts "Destination: #{source_folder}"
    puts "Source: #{destination_folder}"
    puts "Do you want to proceed?"
      value = STDIN.gets[0..0] rescue nil
    exit unless value == 'y' or value == 'Y'
 
    system("rsync -avzP #{rsync_settings} #{destination_folder} #{source_folder}")

  end

end