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
                sshagent(credentials:['jenkins-staging']){
                    sh 'ssh  -o StrictHostKeyChecking=no  root@143.198.219.155 uptime "whoami"'
                }
            }  
        }
    }
    
    post { 
        always { 
            slackSend channel: 'mobile-esign', message: 'test', tokenCredentialId: '0516f92d-2c00-40b0-ad6b-5e25d2eceeea'
        }
    }
}
