import os

def test_image_upload(driver, registered_user):
	"""Test uploading an image after login with the registered user."""
	email, password = registered_user

	# Log in first
	driver.get("http://localhost/qawebapp/login.php")
	driver.find_element("name", "email").send_keys(email)
	driver.find_element("name", "password").send_keys(password)
	driver.find_element("xpath", "//button[@type='submit']").click()

	# Go to upload page
	driver.get("http://localhost/qawebapp/upload.php")
	driver.implicitly_wait(2)

	# Make sure test image file exists
	img_path = os.path.abspath("/home/vboxuser/sample.jpg")
	assert os.path.exists("/home/vboxuser/sample.jpg"), "sample.jpg must exist for this test."

	upload_input = driver.find_element("name", "image")
	upload_input.send_keys("/home/vboxuser/sample.jpg")

	driver.find_element("xpath", "//button[@type='submit']").click()

	driver.implicitly_wait(3)
	assert "Upload & thumbnail created" in driver.page_source
