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
                   sshagent (['64308515-2447-4273-b8f8-b1c06cff7c83']){
                        // ssh block
                       sh 'ssh -o StrictHostKeyChecking=no $STAGING_USER@$PRODUCTION_HOST_LOGISTIK "cd /data/app/pikobar-logistik-frontend && $SSH_COMMAND'

                    }
            }  
        }
    }
}
