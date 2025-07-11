import pytest
from selenium import webdriver
from selenium.webdriver.chrome.options import Options
from selenium.webdriver.common.by import By
import time
import random
import string

@pytest.fixture(scope="session")
def driver():
	"""Set up and teard down the Selenium Chrome WebDriver once per test session."""
	chrome_options = Options()
	chrome_options.add_argument("--headless")
	chrome_options.add_argument("--no-sandbox")
	chrome_options.add_argument("--disable-dev-shm-usage")
	driver = webdriver.Chrome(options=chrome_options)
	yield driver
	driver.quit()

@pytest.fixture(scope="session")
def registered_user(driver):
	"""Fixture to register a new user and return email/password tuple."""
	driver.get("http://localhost/qawebapp/register.php")
	time.sleep(1)

	email = f"testuser_{''.join(random.choices(string.ascii_lowercase, k=6))}@example.com"
	password = "Password123!"

	# Register
	driver.find_element(By.NAME, "email").send_keys(email)
	driver.find_element(By.NAME, "password").send_keys(password)
	driver.find_element(By.XPATH, "//button[@type='submit']").click()
	time.sleep(1)

	assert "Registration successful" in driver.page_source

	return email, password 
