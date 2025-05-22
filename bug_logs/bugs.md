 # QA bug log - QA Web App Project

## Bug 1 - Ubuntu VM Failed to Boot
- **Description**: When creating a new virtual machine in VirtualBox, the user failed to mount an ISO image, resulting in a boot failure.
- **Steps to Reproduce**: 1. Open VirtualBox | 2. Create a new VM | 3. Do not select an operating system ISO | 4. Start the VM
- **Expected**: The Ubuntu installer should launch successfully.
- **Actual**: The VM returns an error message stating that no bootable medium was found.
- **Fix**: Mounted correct Ubuntu ISO and adjusted the boot order to prioritize the virtual optical drive.
- **Screenshot**: (Bug was solved before screenshot was taken)

## Bug 2 - Register Button is Non-Functional and Misaligned
- **Description**: The "Register" button on the registration page is rendered as plain text, not as a clickable button. Additionally, it is misaligned, appearing beside the password field instead of below it.
- **Steps to Reproduce**: 1. Go to register.php page | 2. Observe the form
- **Expected**: A clearly styled, clickable "Register" button placed directly beneath the password input field.
- **Actual**: "Register" is just plain text with no form action and it's placed on the right of password field. 
- **Fix**: Fixed a syntax error: missing closing quote in name="password" caused HTML rendering issues.
- **Severity**: Critical (Blocks account creation)
- **Screenshot**: https://imgur.com/a/rjsCK9l

## Bug 3 - Syntax Error Prevents Access to Upload Page
- **Description**: Visiting the upload.php page results in a parse error due to incorrect array syntax.
- **Steps to Reproduce**: 1. Go to upload.php page | 2. Observe the form
- **Expected**: Page displays file upload form with "Browse..." and "Upload" buttons.
- **Actual**: PHP parse error prevents page from properly loading.
- **Fix**: Fixed syntax error: incorrect assignment 'gif' =? changed to 'gif'=> . 
- **Severity**: Critical (Blocks core functionality)
- **Screenshot**: https://imgur.com/a/Fc2octs

## Bug 4 - Image Upload Fails Due to Directory Permission Error
- **Description**: When attempting to upload an image via the upload.php page, the operation fails due to improper file permissions on the upload directories.
- **Steps to Reproduce**: 1. Go to upload.php page | 2. Click "Browse..." and select a valid image file | 3. Click the "Upload" button 
- **Expected**: The selected image should be uploaded and saved to he uploads/ directory and an image uploaded and thumbnail created message should be shown. 
- **Actual**: The page displays PHP warnings and an "Upload failed" message.
- **Fix**: Corrected directory ownership and permissions for uploads/ and thumbnails/ using chmod and chown.
- **Severity**: Critical (Blocks core functionality)
- **Screenshot**: https://imgur.com/a/0VTJsg4

## Bug 5 - Image Upload Fails Due to Missing 'images' Table in Database
- **Description**: When attempting to upload an image via the upload.php page, uploading fails with a fatal database error because the 'images' table does not exist.
- **Steps to Reproduce**: 1. Go to upload.php page | 2. Click "Browse..." and select a valid image file | 3. Click the "Upload" button 
- **Expected**: The selected image should be saved to the 'images' table and a success message should be shown confirming the upload and thumbnail creation. 
- **Actual**: The image displays a PHP fatal error indicating table qawebapp.images does not exist.
- **Fix**: Accessed the MySQL/MariaDB console and ran a SQL script to create the missing 'images' table.
- **Severity**: Critical (Blocks core functionality)
- **Screenshot**: https://imgur.com/a/Ra7FdYV

## Bug 6 - Syntax Error Prevents Access to Gallery Page
- **Description**: When attempting to access the gallery.php page, the page fails to load due to a syntax error in the session check statement. 
- **Steps to Reproduce**: 1. Open login.php page and login with valid credentials | 2. Access gallery.php page
- **Expected**: The gallery page should load successfully and displays uploaded image thumbnails.
- **Actual**: The page displays a PHP parse error.
- **Fix**: Fixed syntax error: Added missing closing quote in condition "if (!isset($_SESSION['user_id'])) {" 'user_id' was not properly closed.
- **Severity**: Critical (Blocks core functionality)
- **Screenshot**: https://imgur.com/a/4AmaWhn

## Bug 7 - Duplicate Email Registration Error
- **Description**: Attempting to register with an already registered email causes a fatal error and terminates the process.
- **Steps to Reproduce**: 1. Go to register.php page | 2. Register with an email that already exists in the database | 3. Click "Register"
- **Expected**: A friendly "Email already registered." error message should appear.
- **Actual**: The page displays a PHP fatal error with stack trace.
- **Fix**: Implemented error handling to catch duplicate email entry and show friendly straight-forward message. 
- **Severity**: Minor (Undesired behavior, but somewhat understandable to user) 
- **Screenshot**: https://imgur.com/a/wl84Qi9

## Bug 8 - Image Upload Fails Silently on Oversize Upload
- **Description**: When testing for uploading image files that are over the 2MB limit, the page simply shows a failed upload message with no clear reason provided.
- **Steps to Reproduce**: 1. Go to login.php and login | 2. Go to upload.php page | 3. Upload a valid file image larger than 2MB | 4. Click "Upload"
- **Expected**: Page displays a "Error: File too large (max 2MB)" error message.
- **Actual**: The page displays a generic "Upload failed" message.
- **Fix**: Added a conditional check for $_FILES['image']['error'] to detect UPLOAD_ERR_INI_SIZE and display a meaningful error message.
- **Severity**: Minor (Undesired behavior, may confuse user) 
- **Screenshot**: https://imgur.com/a/lA3Sq9P

## Bug 9 - Missing Message in Viewing Gallery Page
- **Description**: If a user has not uploaded any images, the gallery.php page does not display any clarification message. This may confuse users into thinking the page is broken or malfunctioning.
- **Steps to Reproduce**: 1. Go to login.php page | 2. Login with valid credentials | 3. Click "Login" | 4. Go to gallery.php page
- **Expected**: The message "To view a thumbnail, first  upload a valid image file." should be shown when no images exist in the database.
- **Actual**: The gallery does not display any message or indication of next steps.
- **Fix**: Called $stmt->store_result() function to enable row count, then added a condition if($stmt->num_rows === 0) to show the proper message when the image list is empty.
- **Severity**: Minor (Undesired behavior, may confuse user)
- **Screenshot**: https://imgur.com/a/5trtvCf


