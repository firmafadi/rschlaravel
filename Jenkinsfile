pipeline {

    agent any

    environment {
        appNameDevelopment= 'frontend-logistik-development'
        appNameProduction = 'frontend-logistik-production'
        STAGING_USER = "${env.STAGING_USER}"
        STAGING_HOST_LOGISTIK = "${env.STAGING_HOST_LOGISTIK}"
        PRODUCTION_HOST_LOGISTIK = "${env.PRODUCTION_HOST_LOGISTIK}"
        BRANCH = "${env.BRANCH_STAGING}"        
    }

    options {
        timeout(time: 1, unit: 'HOURS')
    }

     triggers {
                githubPush()
     }

    stages{
         stage('Deliver for production') {


            // make sure using branch master
            environment {
                SSH_COMMAND = "ssh-agent bash -c 'ssh-add ~/.ssh/id_rsa; git pull origin master'"     
            }

            steps{
                   sshagent (['centos-7']){
                        // ssh block
                       sh 'ssh -o StrictHostKeyChecking=no root@143.198.219.155 "cd /data/app/pikobar-logistik-api && $SSH_COMMAND  \
                                                                                        && docker-compose -f docker-compose-production.yml down \
                                                                                        && docker-compose -f docker-compose-production.yml build --no-cache \
                                                                                        && docker-compose -f docker-compose-production.yml up -d"'
                    }
            }  
        }
    }
}
