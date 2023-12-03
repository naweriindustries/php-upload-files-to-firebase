# php-upload-files-to-firebase
a php program to upload files to firebase

Navigate to rules under storage and replace code with the following


							rules_version = '2';
							service firebase.storage {
							  match /b/{bucket}/o {
							    match /{allPaths=**} {
							      allow read: if true; // Allows public read access to all files
							      allow write: if request.auth == null; // Allows public write access (no authentication)
							    }
							  }
							}


the above rules create public access to your files. ensure you modify before publishing for production
