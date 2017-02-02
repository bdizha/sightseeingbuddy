server "197.189.202.218", :app, :web, :db, :primary => true
set :branch, 'master'
set :deploy_to, "#{deploy_root}/live"