server "197.189.202.218", :app, :web, :db, :primary => true
set :branch, 'develop'
set :deploy_to, "#{deploy_root}/test"