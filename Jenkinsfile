pipeline {

    agent any

    environment {
   
        PROD_HOST = '143.198.219.155'
        PROD_USER = 'root'
        
        STAGING_HOST = '143.198.219.155'
        STAGING_USER = 'root'
        
        APP_PATH_STAGING = '/var/www/html/rschlaravel'
        APP_PATH_PROD = '/var/www/html/rschlaravel'
    }

    options {
        timeout(time: 1, unit: 'HOURS')
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
                    sh 'ssh  -o StrictHostKeyChecking=no $PROD_USER@$PROD_HOST "cd $APP_PATH_STAGING && whoami"'
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
                    sh 'ssh  -o StrictHostKeyChecking=no $PROD_USER@$PROD_HOST "cd $APP_PATH_PROD && git pull origin $BRANCH"'
                }
            }
        }
    }
    
    post { 
        always { 
            slackSend channel: 'mobile-esign', message: 'Deployed success', tokenCredentialId: '0516f92d-2c00-40b0-ad6b-5e25d2eceeea'
        }
    }
}
