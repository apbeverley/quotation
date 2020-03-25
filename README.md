# Quotation

Development Task

Create a Symfony project (either using Symfony 3.4 or 4.3) for a REST API using DRY and SOLID object-oriented PHP, following PSR-12. The API should accept a JSON payload containing the following fields: age, postcode, regNo. For example, the body of the request might look like this:

{
    "age": 20,
    "postcode": "PE3 8AF"
    "regNo": "PJ63 LXR"
}

Your code should make a call to a third party API to look up the vehicle registration number and return an ABI code. Note this does not need to be a real API call - you can mock the response, but still show an example of how you could go about connecting to a third party API.
 
Use the attached quotation.sql to create a MySQL database which contains rating factors for various ages, postcode areas, and vehicle ABI codes. When a request hits your API, it should look up the base premium from the base_premium table, then find the rating factors to apply for age, postcode area, and ABI code (assume a rating factor of 1 if the value is not in the database). Multiply the premium by each rating factor in turn to obtain a premium. Save all of the quote details to the quote table in the database, and return an appropriate JSON response. Bear in mind that further rating factors might be required in future, and write your code accordingly.
