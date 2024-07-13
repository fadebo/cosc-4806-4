Redesigned app to follow the MVC (Model-View-Controller) format 
Has a login controller and a home controller, a user model, two views, and possibly more! 
When a user creates an account, it is done through creating a new controller and a new function anemed (create)
After 3 unsuccessful login attempts, lock the user out for 60 seconds (based on the time of the last failed attempt)
Uses bootstrap
Implements a basic JavaScript and CSS countdown to display the remaining seconds before a login attempt can be accepted.
Created a private function named logAttempt to login the users attempt(good or bad) to a newly created table in the database
Modified the User model to use the database instead of the session as i figured that someone can bypass the session by using a different laptop or clear cookies to access the account even if they have more than three failed attempts in 1 minute.

<img width="643" alt="image" src="https://github.com/user-attachments/assets/460c3ad1-26f3-4c17-9b9e-fa34e976b8cf">

<img width="632" alt="image" src="https://github.com/user-attachments/assets/834104de-0ce4-4f6d-84b6-765dc0e7346c">

<img width="656" alt="image" src="https://github.com/user-attachments/assets/216f8bef-027f-48e3-b40f-673fcdd5e277">

<img width="653" alt="image" src="https://github.com/user-attachments/assets/2f81e65b-3560-4bf7-869b-a980ea966cb7">

<img width="656" alt="image" src="https://github.com/user-attachments/assets/997a9f72-3cde-4497-94e0-43ccc286d659">

<img width="394" alt="image" src="https://github.com/user-attachments/assets/06966012-07e1-4578-b702-e217bf85ec7b">

<img width="387" alt="image" src="https://github.com/user-attachments/assets/faf82f1d-66f6-429d-8bc8-33924e072429">

