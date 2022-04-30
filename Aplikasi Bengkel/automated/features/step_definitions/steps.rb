require 'selenium-webdriver'
driver = Selenium::WebDriver.for :firefox
Given(/^I Open the atmaauto homepage$/) do  
    driver.navigate.to "http://localhost/testing/login.php"
end
Given(/^I enter username and password$/) do  
    driver.find_element(:id, 'username').send_keys("admin")
    driver.find_element(:id, 'password').send_keys("admin")
    driver.find_element(:id, 'submit').click
    driver.find_element(:id, 'pegawai').click
end
When(/^I enter data$/) do  
    WebElement mySelectElement= driver.find_element(:id, 'id_cabang');
    Select id_cabang=new Select (mySelectElement);
    id_cabang.selectByInder(2);
end

    
    
 
