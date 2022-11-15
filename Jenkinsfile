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
                SSH_COMMAND = "ssh-agent bash -c 'git pull origin master'"     
            }
            
            steps{
                   sshagent (['ssh-centos7-f']){
                        // ssh block
                       sh 'cd /var/www/html/rschlaravel'

                    }
            }  
        }
    }
}
