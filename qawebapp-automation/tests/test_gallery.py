from selenium.webdriver.common.by import By

def test_gallery_shows_thumbnail(driver, registered_user):
	"""Test that the gallery page displays at least one uploaded thumbnail."""
	email, password = registered_user

	# Log in first
	driver.get("http://localhost/qawebapp/login.php")
	driver.find_element("name", "email").send_keys(email)
	driver.find_element("name", "password").send_keys(password)
	driver.find_element("xpath", "//button[@type='submit']").click()

	# Go to gallery page
	driver.get("http://localhost/qawebapp/gallery.php")
	driver.implicitly_wait(2)

	# Validate that gallery shows at least one thumbnail img
	thumbnails = driver.find_elements(By.CSS_SELECTOR, "img")
	assert len(thumbnails) > 0, "Expected at least one thumbnail in the gallery."

