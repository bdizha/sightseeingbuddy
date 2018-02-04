require 'capistrano/ext/multistage'

set :application, "Default 2016"
# set :shared_children, %w(log)
set :deploy_root, "/var/www/default2016"
set :static_root, "/var/www/default2016/static"

# Prevent capistrano from doing ruby stuff on asset folders (that don't exist)
set :normalize_asset_timestamps, false
set :keep_releases, 3

# Create Stages
set :stages, ["staging", "production"]
set :default_stage, "staging"

set :scm, :git
set :repository, "git@bitbucket.org:flowsa/default2016.git"
set :scm_passphrase, ""

set :deploy_via, :remote_cache #instead of doing a full git clone every time, git pull is used
set :user, "deploy"
set :use_sudo, false

before "deploy:create_symlink", "deploy:create_folders"

after "deploy:create_symlink", "deploy:cleanup"
after "deploy:create_symlink", "deploy:clear_varnish"

namespace :deploy do

  task :create_folders, :roles => :app do
    cmd = []
    cmd << "mkdir -p -m777 #{static_root}/storage/userphotos"
    cmd << "mkdir -p -m777 #{static_root}/uploads/files"
    cmd << "rm -rf #{release_path}/public/uploads"
    cmd << "ln -s #{static_root}/uploads/ #{release_path}/public/uploads"

    cmd << "rm -rf #{release_path}/craft/storage/userphotos"
    cmd << "ln -s #{static_root}/storage/userphotos #{release_path}/craft/storage/userphotos"

    cmd << "cd #{release_path}"
    # cmd << "cd #{release_path} && bower install"
    run cmd.join(' && ')
  end

  task :clear_varnish, :roles => :app do
    run "curl -X EE_PURGE localhost"
  end

end

# Run this before starting work on your project

namespace :local do 
  
  task :init do
    logger.info "Symlink githooks directory"
    system("rm -rf .git/hooks && ln -s ../githooks .git/hooks")
  end

end

namespace :tests do
    task :acceptance do
  
      # needs to be converted to craft

      # logger.info "Running the git pre-commit bash script to ensure latest db dump saved and will be used"
      # system("bash git_hooks/pre-commit")
      
      # logger.info "running tests..."

      # system("cd codecept && php codecept.phar run; cd -")

      # logger.info "After tests, resetting database to dump local DB, just in case"
      # system("mysql -uroot -prjfrank -h127.0.0.1 #{db_name} < db/dump.sql")

    end
end

namespace :codeception do
    task :delete_test_user do
        # needs to be converted to craft

        # logger.info('Deleting test user from DB')
        # system("mysql -u root -prjfrank -D #{db_name} -e \"delete from exp_members where username='testing@ilikepie.simpleyak.com';\"")
    end
end
