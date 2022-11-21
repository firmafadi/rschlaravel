pipeline {

    agent any

    environment {
        APP_NAME = 'rschlaravel'
        PROD_HOST = "${env.PROD_HOST}"
        PROD_USER = "${env.PROD_USER}"
        STAGING_HOST = "${env.STAGING_HOST}"
        STAGING_USER = "${env.STAGING_USER}"
        APP_PATH_STAGING = '/var/www/html/rschlaravel1'
        APP_PATH_PROD = '/var/www/html/rschlaravel'
        SLACK_TOKEN = '0516f92d-2c00-40b0-ad6b-5e25d2eceeea'
        SLACK_CHANNEL = 'mobile-esign'
    }

    options {
        timeout(time: 1, unit: 'HOURS')
    }

    stages{
        stage('Deliver for staging') {

            when {
                branch 'staging'
            }
             
            steps{
                sshagent(credentials:['jenkins-staging']){
                    sh 'ssh  -o StrictHostKeyChecking=no $PROD_USER@$PROD_HOST "cd $APP_PATH_STAGING && git pull origin staging1"'
                }
            }
        }
        
         stage('Deliver for production') {

            when {
                branch 'master'
            }

            steps{
                sshagent(credentials:['jenkins-staging']){
                    sh 'ssh  -o StrictHostKeyChecking=no $PROD_USER@$PROD_HOST "cd $APP_PATH_PROD && git pull origin master"'
                }
            }
        }
    }
    
    post { 
        success { 
            slackSend channel: "$SLACK_CHANNEL", message: "[$APP_NAME] [$GIT_BRANCH] - Deployed success", color:'good', tokenCredentialId: '0516f92d-2c00-40b0-ad6b-5e25d2eceeea'
        }
        failure {
            slackSend channel: "$SLACK_CHANNEL", failOnError: true, message: "[$APP_NAME] [$GIT_BRANCH] - Deploy failed  - ${env.JOB_NAME} ${env.BUILD_NUMBER} (<${env.BUILD_URL}|Open>)", color:'danger', tokenCredentialId: "$SLACK_TOKEN"
        }
    }
}
