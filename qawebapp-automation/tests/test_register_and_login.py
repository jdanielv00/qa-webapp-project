def test_login_with_registered_user(driver, registered_user):
	"""Test that login works witha a freshly registered user."""
	email, password = registered_user

	driver.get("http://localhost/qawebapp/login.php")
	driver.find_element("name", "email").send_keys(email)
	driver.find_element("name", "password").send_keys(password)
	driver.find_element("xpath", "//button[@type='submit']").click()

	driver.implicitly_wait(3)
	assert "Go to image upload" in driver.page_source
