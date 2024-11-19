<h2 align="center">
Verso GmbH Challenge 📝
</h2>
<h3>
Welcome! This is an implementation of the PHP Coding Challenge for Verso GmbH
</h3>
As you will see, this repository covers the required challenge by Verso from a friendly way till a technical depth.

##### Digging in the repository you'll find the files necessary to solve the challenge as well as the whole infrastructure to test it fast
To check the test, there are 3 ways to do it:
1. **Browser**:
   1. First you will need to start the container. For it, from a terminal of your OS, you will need to go to the folder where you download the code.
   2. If you have a SO based on Unix, you only need to execute `./exec build`
      1. In other case you should run:
         - `php composer.phar install --optimize-autoloader --no-dev --no-interaction --no-progress --ansi`
         - `docker compose up -d --build`
   - NOTE: In case you have a macOS ready for it, you could rebuild the environment certificate executing `./exec rebuild-mac`
   3. Now, you can check the test typing in your favorite browser https://localhost:8098 and accepting the warning or http://localhost:8031
      - You can check the test in a more friendly way typing https://verso.test:8098 or http://verso.test:8031
      - NOTE: Do not forget to add to your `/etc/host` file the line `127.0.0.1 verso.test` to reach the page correctly.
   4. If you want to test other amounts, you can type after the previous URLs `/{amountToTest}/{fizzValue}/{buzzValue}`
      - `{amountToTest}` -> will replace the total amount of numbers to check (default: 100)
      - `{fizzValue}` -> will replace the value to show the string 'Fizz' (default: 3)
      - `{buzzValue}` -> will replace the value to show the string 'Buzz' (default: 5)
2. **API**:
   1. Follow the steps **1.i** and **1.ii**.
   2. Now, you can check the test calling from your favorite API client to the endpoint https://localhost:8098/api or http://localhost:8031/api
      - You can check the test in a more friendly way calling to the endpoint https://verso.test:8098/api or http://verso.test:8031/api
      - NOTE: Do not forget to add to your `/etc/host` file the line `127.0.0.1 verso.test` to reach the endpoint correctly.
   3. If you want to test other amounts, you can follow the indications of the step **1.iv**
3. **Console**:
   1. Follow the steps **1.i** and **1.ii**.
   2. If you have a SO based on Unix, you only need to execute `./exec challenge`
      1. In other case you should run:  
         - `docker compose exec verso.test php bin/console verso:challengeTest`
   - NOTE: If you want to test other amounts, you can run any of the previous console ways adding `{amountToTest} {fizzValue} {buzzValue}`
     - `{amountToTest}` -> will replace the total amount of numbers to check (default: 100)
     - `{fizzValue}` -> will replace the value to show the string 'Fizz' (default: 3)
     - `{buzzValue}` -> will replace the value to show the string 'Buzz' (default: 5)