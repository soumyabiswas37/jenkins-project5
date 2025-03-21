pipeline {
    agent any
    stages {
        // stage("Cloning GIT and configuring application to PPRD") {
        //     agent {
        //         label 'PPRD'
        //     }
        //     steps {
        //         sh 'ls -l'
        //         sh 'sudo yum install php -y'
        //         sh 'sudo cp -p index.php /var/www/html'
        //         sh 'chown apache:apache /var/www/html -R'
        //         sh 'sudo systemctl restart httpd'
        //         sh 'sudo systemctl status httpd'
        //         sh 'sudo curl http://localhost:80'
        //     }
        // }
        // stage("Verify and Approve") {
        //     steps {
        //         input message: "Do you want to proceed?", ok: 'Yes'
        //     }
        // }
        stage("Deployment in PROD") {
            parallel {
                stage("Deployment in 1st PROD Machine") {
                    agent {
                        label 'PROD1'
                    }
                    steps {
                        sh 'ls -l'
                        sh 'sudo yum install php -y'
                        sh 'sudo cp -p index.php /var/www/html'
                        sh 'sudo chown apache:apache /var/www/html -R'
                        sh 'sudo systemctl restart httpd'
                        sh 'sudo systemctl status httpd'
                        sh 'sudo curl http://localhost:80'
                    }
                }
                stage("Deployment in 2nd PROD Machine") {
                    agent {
                        label 'PROD2'
                    }
                    steps {
                        sh 'ls -l'
                        sh 'sudo yum install php -y'
                        sh 'sudo cp -p index.php /var/www/html'
                        sh 'sudo chown apache:apache /var/www/html -R'
                        sh 'sudo systemctl restart httpd'
                        sh 'sudo systemctl status httpd'
                        sh 'sudo curl http://localhost:80'
                    }
                }
            }
        }
        stage("Cleaning Workspace") {
            parallel {
                // stage("Cleaning workspace in PPRD") {
                //     agent { label 'PPRD'}
                //     steps {
                //         cleanWs()
                //     }
                //  }
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