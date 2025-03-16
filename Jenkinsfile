pipeline {
    agent any
    stages {
        stage("Cloning GIT and configuring application to PPRD") {
            agent {
                label 'PPRD'
            }
            steps {
                sh 'sudo git --version'
                sh 'sudo git clone https://github.com/soumyabiswas37/jenkins-project5.git'
                sh 'sudo ls -lrt'
                sh 'sudo yum update -y'
                sh 'sudo curl -sL https://rpm.nodesource.com/setup_16.x | sudo bash -'
                sh 'sudo yum install -y nodejs'
                sh 'sudo node -v'
                sh 'sudo mkdir public-ip-app'
                sh 'sudo cd public-ip-app'
                sh 'sudo npm init -y'
                sh 'sudo cp /jenkins/app.js .'
                sh 'sudo node app.js'
                sh 'sudo curl http://localhost:3000'
            }
        }
        stage("Verify and Approve") {
            steps {
                input message: "Do you want to proceed?", ok: 'Yes'
            }
        }
        stage("Deployment in PROD") {
            parallel {
                stage("Deployment in 1st PROD Machine") {
                    agent {
                        label 'PROD1'
                    }
                    steps {
                        sh 'sudo git --version'
                        sh 'sudo git clone https://github.com/soumyabiswas37/jenkins-project5.git'
                        sh 'sudo ls -lrt'
                        sh 'sudo yum update -y'
                        sh 'sudo curl -sL https://rpm.nodesource.com/setup_16.x | sudo bash -'
                        sh 'sudo yum install -y nodejs'
                        sh 'sudo node -v'
                        sh 'sudo mkdir public-ip-app'
                        sh 'sudo cd public-ip-app'
                        sh 'sudo npm init -y'
                        sh 'sudo cp /jenkins/app.js .'
                        sh 'sudo node app.js'
                        sh 'sudo curl http://localhost:3000'
                    }
                }
                stage("Deployment in 2nd PROD Machine") {
                    agent {
                        label 'PROD2'
                    }
                    steps {
                        sh 'sudo git --version'
                        sh 'sudo git clone https://github.com/soumyabiswas37/jenkins-project5.git'
                        sh 'sudo ls -lrt'
                        sh 'sudo yum update -y'
                        sh 'sudo curl -sL https://rpm.nodesource.com/setup_16.x | sudo bash -'
                        sh 'sudo yum install -y nodejs'
                        sh 'sudo node -v'
                        sh 'sudo mkdir public-ip-app'
                        sh 'sudo cd public-ip-app'
                        sh 'sudo npm init -y'
                        sh 'sudo cp /jenkins/app.js .'
                        sh 'sudo node app.js'
                        sh 'sudo curl http://localhost:3000'
                    }
                }
            }
        }
        stage("Cleaning Workspace") {
            parallel {
                stage("Cleaning workspace in PPRD") {
                    agent { label 'PPRD'}
                    steps {
                        cleanWs()
                    }
                }
                stage("Cleaning workspace in PROD1") {
                    agent { label 'PROD1' }
                    steps {
                        cleanWs()
                    }
                }
                stage("Cleaning workspace in PROD2") {
                    agent { label 'PROD2' }
                    steps {
                        cleanWs()
                    }
                }
            }
        }
    }
}