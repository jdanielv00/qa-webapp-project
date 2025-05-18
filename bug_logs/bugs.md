 # QA bug log - QA Web App Project

## Bug 1 - Ubuntu VM Failed to Boot
- **Type**: Environment Setup
- **Steps to Reproduce**: Created VM in VirtualBox without selecting OS ISO
- **Expected**: VM boots Ubuntu installer
- **Actual**: Error message about missing OS
- **Fix**: Mounted correct ISO and set proper boot order

## Bug 2 - Register button is non-functional and misaligned
- **Type**: UI
- **Steps to Reproduce**: Go to register page and observe the form
- **Expected**: A clearly styled, clickable "Register" button that submits the form
- **Actual**: "Register is just plain text with no form action
- **Fix**: Syntax error fix: name="password -> name="password"
- **Severity**: High
- **Screenshot**: https://imgur.com/a/rjsCK9l

## Bug 3 - Non-Functional Image Upload Page
- **Description**: 
- **Steps to Reproduce**: Go to upload page and observe the form
- **Expected**: A page with a title, "Browse..." and "Upload" buttons
- **Actual**: Syntax error appears on the page
- **Fix**: Syntax error fix: 'gif' =? -> 'gif'=>
- **Severity**: High (bug blocks core functionality)
- **Screenshot**: https://imgur.com/a/Fc2octs

## Bug 4 - Image Upload Fails Due to Directory Permission Error
- **Description**: When attempting to upload an image via the upload.php page, the operation fails with the following error missages displayed on the web page (see inserted image).
- **Steps to Reproduce**: 1. Go to upload.php page | 2. Click "Browse..." and select any valid image file | 3. Click the "Upload" button | 4. Observe the error message on the page
- **Expected**: The selected image should be uploaded and saved to he uploads/ directory and an image uploaded and thumbnail created message should be shown. 
- **Actual**: The page displays PHP warnings and an "Upload failed" message because the file is not saved to the server.
- **Fix**: The issue was resolved by assigning correct access and ownership of the uploads/ and thumbnails/ directories to the www-data user.
- **Severity**: High (bug blocks core functionality)
- **Screenshot**: https://imgur.com/a/0VTJsg4

## Bug 5 - Image Upload Fails Due to Missing 'images' Table in Database
- **Description**: When attempting to upload an image via the upload.php page, the operation fails and a PHP fatal error is displayed. The error states that the 'images' table does not exist in the 'qawebapp' database.
- **Steps to Reproduce**: 1. Go to upload.php page | 2. Click "Browse..." and select any valid image file | 3. Click the "Upload" button | 4. Observe the error message on the page
- **Expected**: The selected image should be uploaded and saved to the uploads/ directory. A success message should be shown confirming the upload and thumbnail creation. 
- **Actual**: The image displays a PHP fatal error. The image upload fails and no file is saved.
- **Fix**: Accessed the MySQL/MariaDB console and ran a SQL script to create the missing 'images' table.
- **Severity**: High (bug blocks core functionality)
- **Screenshot**: https://imgur.com/a/Ra7FdYV

## Bug 6 - Syntax Error Prevents Access to Gallery Page
- **Description**: When attempting to access the gallery.php page, the application returns a PHP parse error due to a syntax issue in the session validation code. 
- **Steps to Reproduce**: 
- **Expected**:
- **Actual**:
- **Fix**:

- **Type**:
- **Steps to Reproduce**:
- **Expected**:
- **Actual**:
- **Fix**:

- **Type**:
- **Steps to Reproduce**:
- **Expected**:
- **Actual**:
- **Fix**:

- **Type**:
- **Steps to Reproduce**:
- **Expected**:
- **Actual**:
- **Fix**:

- **Type**:
- **Steps to Reproduce**:
- **Expected**:
- **Actual**:
- **Fix**:

- **Type**:
- **Steps to Reproduce**:
- **Expected**:
- **Actual**:
- **Fix**:

- **Type**:
- **Steps to Reproduce**:
- **Expected**:
- **Actual**:
- **Fix**:

- **Type**:
- **Steps to Reproduce**:
- **Expected**:
- **Actual**:
- **Fix**:

- **Type**:
- **Steps to Reproduce**:
- **Expected**:
- **Actual**:
- **Fix**:

- **Type**:
- **Steps to Reproduce**:
- **Expected**:
- **Actual**:
- **Fix**:



