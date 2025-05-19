 # QA bug log - QA Web App Project

## Bug 1 - Ubuntu VM Failed to Boot
- **Description**: 
- **Steps to Reproduce**: Created VM in VirtualBox without selecting OS ISO
- **Expected**: VM boots Ubuntu installer
- **Actual**: Error message about missing OS
- **Fix**: Mounted correct ISO and set proper boot order

## Bug 2 - Register button is non-functional and misaligned
- **Description**: When attempting to register a new account, the user is unable to do so because the "Register" button does not exist because it is simply text and not an actionable button. Addtionally, the text is misaligned and not under the password input box.
- **Steps to Reproduce**: 1. Go to register.php page |2. Observe the form
- **Expected**: A clearly styled, clickable "Register" button that submits the form that is placed right under the "Password" input box.
- **Actual**: "Register" is just plain text with no form action and it's placed on the right of "Password" option. 
- **Fix**: Syntax error fix: there was a missing closing quote, name="password -> name="password" that caused both bugs.
- **Severity**: Critical (bug blocks core functionality)
- **Screenshot**: https://imgur.com/a/rjsCK9l

## Bug 3 - Syntax Error Prevents Access to Upload Page
- **Description**: When attempting to access the upload.php page, the operation fails with the page displaying a Parse error.
- **Steps to Reproduce**: 1. Go to upload.php page | 2. Observe the form
- **Expected**: A page with a title, "Browse..." and "Upload" buttons.
- **Actual**: The page displays a parse error.
- **Fix**: Syntax error fix: 'gif' =? -> 'gif'=> 
- **Severity**: Critical (bug blocks core functionality)
- **Screenshot**: https://imgur.com/a/Fc2octs

## Bug 4 - Image Upload Fails Due to Directory Permission Error
- **Description**: When attempting to upload an image via the upload.php page, the operation fails with the following error missages displayed on the web page (see inserted image).
- **Steps to Reproduce**: 1. Go to upload.php page | 2. Click "Browse..." and select any valid image file | 3. Click the "Upload" button | 4. Observe the error message on the page
- **Expected**: The selected image should be uploaded and saved to he uploads/ directory and an image uploaded and thumbnail created message should be shown. 
- **Actual**: The page displays PHP warnings and an "Upload failed" message because the file is not saved to the server.
- **Fix**: The issue was resolved by assigning correct access and ownership of the uploads/ and thumbnails/ directories to the www-data user.
- **Severity**: Critical (bug blocks core functionality)
- **Screenshot**: https://imgur.com/a/0VTJsg4

## Bug 5 - Image Upload Fails Due to Missing 'images' Table in Database
- **Description**: When attempting to upload an image via the upload.php page, the operation fails and a PHP fatal error is displayed. The error states that the 'images' table does not exist in the 'qawebapp' database.
- **Steps to Reproduce**: 1. Go to upload.php page | 2. Click "Browse..." and select any valid image file | 3. Click the "Upload" button | 4. Observe the error message on the page
- **Expected**: The selected image should be uploaded and saved to the uploads/ directory. A success message should be shown confirming the upload and thumbnail creation. 
- **Actual**: The image displays a PHP fatal error. The image upload fails and no file is saved.
- **Fix**: Accessed the MySQL/MariaDB console and ran a SQL script to create the missing 'images' table.
- **Severity**: Critical (bug blocks core functionality)
- **Screenshot**: https://imgur.com/a/Ra7FdYV

## Bug 6 - Syntax Error Prevents Access to Gallery Page
- **Description**: When attempting to access the gallery.php page, the application returns a PHP parse error due to a syntax issue in the session validation code. 
- **Steps to Reproduce**: 1. Open gallery.php | 2. Ensure user is logged in  | 3. Observe the form
- **Expected**: The gallery page should load and show the created thumbnail of the image uploaded.
- **Actual**: The page displays a PHP parse error.
- **Fix**: Syntax error: there was a missing closing quote in line 4 "if (!isset($_SESSION['user_id'])) {" 'user_id' was not properly closed.
- **Severity**: Critical (bug blocks core functionality)
- **Screenshot**: https://imgur.com/a/4AmaWhn

## Bug 7 - Duplicate Email Registration Error
- **Description**: When testing for duplicate email registration, the page displays a fatal error and it crashes registration process.
- **Steps to Reproduce**: 1. Go to register.php page | 2. Try registering with an email already registered | 3. Click "Register" | 4. Observe the form
- **Expected**: A friendly error message should appear stating "Email already registered."
- **Actual**: The page displays a PHP fatal error with stack trace.
- **Fix**: Add logic to detect duplicate entry error and show friendly straight-forward message. 
- **Severity**: Minor (user may understand the problem, but it is an undesired behavior) 
- **Screenshot**: https://imgur.com/a/wl84Qi9

## Bug 8 - Image Upload Fails Silently on Oversize Upload
- **Description**: When testing for uploading image files that are over the 2MB limit, the page simply shows a failed upload message. This is unclear and leaves user confused as to why the upload failed.
- **Steps to Reproduce**: 1. Go to upload.php page | 2. Log in, if not already | 3. Upload a valid file image larger than 2MB | 4. Click "Upload"
- **Expected**: User should page with "Error: File too large (max 2MB)" error message.
- **Actual**: The page displays a generic "Upload failed" message.
- **Fix**: PHP's $_FILES['image']['error'] was not checked, so when the file size is too large it simply returns UPLOAD_ERR_INI_SIZE before size check. Added a condtional block to check the eize and handle known upload errors before continuing.
- **Severity**: Minor (undesired behavior, may confuse user) 
- **Screenshot**: https://imgur.com/a/lA3Sq9P

## Bug 9 - Missing Clarification Message in Viewing Gallery Page
- **Description**: When testing to verify the gallery page displays a message prompting the user to first upload a valid image file when a user does not upload any images yet and tries to view gallery, the gallery page does not show any message.
- **Steps to Reproduce**: 1. Go to login.php page | 2. Login with valid credentials | 3. Click "Login" | 4. Go to gallery.php page | 5. Observe the form
- **Expected**: If the user has not uploaded any images, the page should display a "To view a thumbnail, first  upload a valid image file."
- **Actual**: The gallery does not display any message.
- **Fix**: Add store_result() function to buffer the result set and allow row counting. Then, add a condition if($stmt->num_rows === 0) to check if there are nay uploaded images. This will return the "To view a thumbnail, first  upload a valid image file." message if there are no uploaded images.
- **Severity**: Minor (undesired behavior, may confuse user) 
- **Screenshot**: https://imgur.com/a/5trtvCf

- **Description**:
- **Steps to Reproduce**:
- **Expected**:
- **Actual**:
- **Fix**:
- **Severity**:
- **Screenshot**:

- **Description**:
- **Steps to Reproduce**:
- **Expected**:
- **Actual**:
- **Fix**:
- **Severity**:
- **Screenshot**:

- **Description**:
- **Steps to Reproduce**:
- **Expected**:
- **Actual**:
- **Fix**:
- **Severity**:
- **Screenshot**:



