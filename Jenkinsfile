pipeline {

    agent any

    environment {
        appNameDevelopment= 'frontend-logistik-development'
        appNameProduction = 'frontend-logistik-production'
        STAGING_USER = "${env.STAGING_USER}"
        STAGING_HOST_LOGISTIK = "${env.STAGING_HOST_LOGISTIK}"
        PRODUCTION_HOST_LOGISTIK = "${env.PRODUCTION_HOST_LOGISTIK}"
        BRANCH = "${env.BRANCH_STAGING}"    
        
        PROD_HOST = '143.198.219.155'
        PROD_USER = 'root'
        APP_PATH = '/var/www/html/rschlaravel'
    }

    options {
        timeout(time: 1, unit: 'HOURS')
    }

     triggers {
                githubPush()
     }

    stages{
        stage('Deliver for staging') {

            when {
                branch 'staging'
            }

            environment {
                BRANCH = "staging"     
            }
             
            steps{
                sshagent(credentials:['jenkins-staging']){
                    sh 'ssh  -o StrictHostKeyChecking=no $PROD_USER@$PROD_HOST "cd $APP_PATH && whoami"'
                }
            }
        }
        
         stage('Deliver for production') {

            when {
                branch 'master'
            }
            // make sure using branch master
            environment {
                BRANCH = "master"     
            }
             
            steps{
                sshagent(credentials:['jenkins-staging']){
                    sh 'ssh  -o StrictHostKeyChecking=no $PROD_USER@$PROD_HOST "cd $APP_PATH && git pull origin $BRANCH"'
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
