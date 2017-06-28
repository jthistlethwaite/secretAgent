# Secret Agent Message App

This is a coding exercise used to demonstrate grasp of fundamental programming concepts in PHP.

An example solution is presented as error.php.

## Overview

The participant is given the requirements below and asked to create an app which meets the requirements as closely as possible. There should be a time limit set, generally 45 minutes to an hour and half.

At the end of the time the participant should present his solution. The participant should be graded based on:

* How many of the features did the participant implement?
  * Did the participant implement all of the requested features?
  * Do the implemented features work properly?
  * For any features not implemented, what is the reason?
* Can the participant explain his design choices, demonstrating an understanding of his own code?
* Did the participant ask for clarification about any of the features?
  * Is there something the participant should have asked but didn't, and how do they respond when this is mentioned?
* Did the participant struggle with "guessing" at something they could have looked up on Google or Stack Overflow?

## Exercise

You have been asked to create a special web page for a secret agent in hostile territory to check-in with his handler and receive new orders. This project is urgent because the normal channel of communication with our agent has been compromised and we need to quickly set up a new way to communicate orders to him.

### Feature Requirements

1. As a random person on the internet viewing this web page I	should not be able to tell it has a secret functionality. It should look boring and not interesting so I don’t pay attention to it or want to investigate what the page is for.
2. As the secret agent I should be able to visit the page in a special way that will allow me to login and view the last secret	message left for me.
3. As the agent’s handler I should be able to visit the page in a special way that will allow me to login and save a new message for the secret agent so he will see it next time he logs in.
4. The special method for accessing the page should be difficult to distinguish from normal traffic. This is so an admin reviewing log files is unlikely to think there is anything special about this page.
5. The page should only be one file.
6. The messages stored by this app should not be easily readable by someone who has admin access to the server.
7. The password required by the agent or the handler should change each time they login successfully. This is so if somebody finds out the agent or handler’s password it will only work once.
8. You should only use HTML and the PHP 7 standard library when creating this page. This is because it could potentially be deployed on a web host where we can't control what other dependencies are available.
9. Messages left for the secret agent should only be readable once.