# qa-webapp-project

## Overview
This is a hands-on Quality Assurance (QA) project testing a user gallery system (registration, login, image uploads, and gallery functionality). This project demonstrates end-to-end manual QA testing of a PHP/MySQL web application simulating an image gallery. It focuses on:
- Identifying functional/non-functional bugs through structured test cases.
- Documenting resolutions for server, UI, and edge-case issues.
- Practicing regression testing and environment validation.

## QA Objectives & Outcomes
- Bug documentation: Documented 20+ test cases (Excel) with 6 critical bugs found and resolved.
- Regression testing: Verified fixes across PHP 8.3 and MySQL versions.
- Envinronment Debugging: Solved Apache config issues and Linux file permission errors. 
- Edge-Case Coverage: Tested duplicate emails, invalid uploads, unauthorized access, and more.

## Testing Scope
1. Functional Testing
- User flows: Registration -> Login -> Image Upload -> View Gallery
- Edge cases: Empty form submissions, invalid file types (PDFs, >2MB uploads).
2. Non-functional Testing
- UI Consistency: Cross-browser testing.
- Error Handling: Verified user friendly messages for failures.
3. Environment Validation
- Environment and server validation (Apache, PHP, MySQL setup).
- Verified MySQL table structures and query errors. 

## Tech Stack & Tools
- Backend: PHP 8+, MySQL, Apache
- Infrastructure: Ubuntu (via VirtualBox), Linux file permissions
- QA Tools: Structured test cases (Excel), Browser DevTools, PHP error logs
- Soft skills: Bug documentation, troubleshooting, collaboration (simulated via Git commits)

## Automation Testing (Selenium + Pytest)
To expand testing coverage, I implemented automated UI tests using Selenium WebDriver and Pytest to simulate real user interactions.
What It Covers:
- test_register_and_login.py: Generates a random email and performs full registration/login flow.
- test_upload.py: Uploads a test image and confirms it's accepted and processed.
- test_gallery.py: Verifies that uploaded images appear in the user’s gallery.

Tools & Libraries
- Selenium WebDriver (Chrome in headless mode)
- Pytest for test organization and fixtures
- Python’s 'random' module for dynamic test data

Automation Status
While the test framework architecture is now properly structured with Pytest, the automated tests are not yet passing due to several foundational issues - including XPath syntax errors ('/button' vs '//button'), missing Selenium 'By' imports, and UI output not matching test assertions. These early-stage implementation challenges are expected when developing automation expertise, and each one has provided valuable lessons about test precision and validation workflows.

Note: This test suite reflects my hands-on journey in learning test automation. I’ve deliberately preserved these initial failures to demonstrate real-world learning by showcasing common automation challenges (XPath syntax, dynamic waits, assertion mismatches), highlight problem-solving growth through documented debugging processes, and emphasize the QA mindset (progress often starts with identifying what doesn’t work).

## Key QA Skills Demonstrated
- Bug Documentation: Wrote reproducible bug reports with steps, expected vs. actual results.
- Test Coverage: Prioritized high impact edge cases.
- Process Ownership: Self-directed testing lifecycle (plan -> execute -> document -> retest).
- Writing structured test cases
- Analyzing error logs and warnings
- How to build and structure UI automation from scratch
- Importance of test isolation and reusability (via fixtures)
- Using headless browser testing for CI-ready pipelines

## Notes
- This project was developed as a self-guided QA initiative to gain hands-on experience testing a real web application environmnent. The backend code was scaffolded with AI assistance to simulate a production-like system, while **all QA processes** such as test planning, bug discovery, documentation, and validation, were executed independently.
- Future Improvements: Postman API tests.

## Contact 
If you are a recruiter or hiring manager, let's discuss how my QA skills can translate to your team!

Email: jdvargasvidal@gmail.com |
LinkedIn: www.linkedin.com/in/jdanielvargas
