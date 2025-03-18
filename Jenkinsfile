pipeline {
    agent any
    stages {
        stage("Cloning GIT and configuring application to PPRD") {
            agent {
                label 'PPRD'
            }
            steps {
                sh "sudo pwd"
                sh 'sudo ls -lrt'
                sh 'sudo yum update -y'
                sh 'sudo yum install httpd -y'
                sh 'sudo cp -p index.html /var/www/html'
                sh 'sudo systemctl enable --now httpd'
                sh 'sudo systemctl status httpd'
                sh 'sudo curl http://localhost:80'
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
                        sh "sudo pwd"
                        sh 'sudo ls -lrt'
                        sh 'sudo yum update -y'
                        sh 'sudo yum install httpd -y'
                        sh 'sudo cp -p index.html /var/www/html'
                        sh 'sudo systemctl enable --now httpd'
                        sh 'sudo systemctl status httpd'
                        sh 'sudo curl http://localhost:80'
                    }
                }
                stage("Deployment in 2nd PROD Machine") {
                    agent {
                        label 'PROD2'
                    }
                    steps {
                        sh "sudo pwd"
                        sh 'sudo ls -lrt'
                        sh 'sudo yum update -y'
                        sh 'sudo yum install httpd -y'
                        sh 'sudo cp -p index.html /var/www/html'
                        sh 'sudo systemctl enable --now httpd'
                        sh 'sudo systemctl status httpd'
                        sh 'sudo curl http://localhost:80'
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