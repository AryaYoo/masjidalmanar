pipeline {
    agent any
    stages {
        stage('Checkout') {
            steps {
                git branch: 'main', url: 'https://github.com/AryaYoo/masjidalmanar.git'
            }
        }
        stage('Send Dockerfile to Ansible') {
            steps {
                echo 'Executing Ansible Playbook'
            }
        }
        stage('Build Docker Image') {
            steps {
                echo 'Executing Build Docker Image'
            }
        }
        stage('Push Image to Docker Hub') {
            steps {
                echo 'Executing docker push seeU_website'
            }
        }
        stage('Copy Files to Kubernetes') {
            steps {
                echo 'Executing scp file1.txt user@kubernetes-server:./'
            }
        }
        stage('Deploy to Kubernetes') {
            steps {
                echo  'Executing ansiblePlaybook playbook: deploy.yml'
            }
        }
    }
}
