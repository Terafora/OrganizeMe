# OrganizeMe

## About

OrganizeMe is a todo list application made for setting tasks and prioritising them.

The goal of this project was to put into practice what I've learned about PHP and implement it with MySQL as well as not use additional styling frameworks.


### Home

![Screen Recording - Apr 9, 2024](https://github.com/Terafora/OrganizeMe/assets/144109245/8fa2cd3d-063e-4238-a014-477bafbff0c9)

- This is where the main dashboard is and where your notes/todos live.
- The notes are coloured by priority which is manually set upon creation and can be editted by the user.

![Screen Recording - Apr 9, 2024 (2)](https://github.com/Terafora/OrganizeMe/assets/144109245/3f6005fd-22f7-4fde-ad76-0cde19a13e82)

- From here users can also delete their notes/todos which they have completed of no longer need.

![Screen Recording - Apr 9, 2024 (1)](https://github.com/Terafora/OrganizeMe/assets/144109245/48bd51b8-b573-4e29-b551-e52f4cf9de41)

- Users are also able to select a button to create a new note.

![Screen Recording - Apr 9, 2024 (3)](https://github.com/Terafora/OrganizeMe/assets/144109245/90abd886-51ee-413c-9b95-2ce55ad7a39e)

- Users are also able to edit a note.

![Screen Recording - Apr 9, 2024 (4)](https://github.com/Terafora/OrganizeMe/assets/144109245/d5825114-40ed-4ca7-9f51-d9127c364a15)

- Users can even set the status of their todos.

### Form

![Screenshot 2024-04-09 180610](https://github.com/Terafora/OrganizeMe/assets/144109245/53bda497-4052-4be8-bc95-f3557b7ea69c)

- This is where notes/todos can be created and edited by the user.
- Each note/todo has required fields and is automatically set a unique ID and default status of incomplete.

## Technologies

- PHP 
- CSS
- Vanilla JavaScript / AJAX
- MySQL (with XAMMP)

## Design

Due to the short time frame imposed on the project and this being my first time making a project with PHP and dusting off my knowledge of MySQL after almost a decade I decided to keep the design fairly basic and straight forward to allow for easier designing for multiple screens, especially as I would not be using any frameworks such as BootStrap or Tailwind.

Basic colours were used for each card to indicate priority quickly and efficiently to users while being too saturarted so that the contents of cards/todos could be easily read.

## Features

- This app is fully CRUD capable so it can:

    - Create new notes/todos.

    - Display notes/todos.
    
    - Edit notes/todos.

    - Delete notes/todos.
 
    - Set status of notes/todos.

### Still To Come

Due to the time limit I wasnn't able to implement the following:

- Automatically Changing Priority Levels On Cards
    - This wasn't started however I would be interested in making it so cards would automatically change priority level so that users would have more of a heads up on task deadlines.

## Testing

- Minor tests were run on site to make sure.
    - Forms ran correctly.
    - Actions ran correctly (CRUD functionality)
    - Layouts displayed correctly on each page.
 
## Bugs

- On the display for status in the top right of each note/todo the icon doesn't reflect the toggle from completed (circle with a tick) to unfinished (empty circle), until reload.
    - Potential solution may be to use radio buttons instead and manually style those.

## Credits

- Icons were used from [FontAwesome](https://fontawesome.com/)
- Background CSS was made with the help of [100L5](https://10015.io)
- Error checking done via:
    - [Stack Overflow](https://stackoverflow.com/)
    - [freeCodeCamp](https://www.freecodecamp.org/news/how-to-get-started-with-php/)
    - [Reddit](https://Reddit.com/)
    - [Jet Brains](https://www.jetbrains.com)
    - [PHP official site](https://www.php.net)
    - [MySQL](https://dev.mysql.com)
    - [ChatGPT](https://chat.openai.com/)

## Where to find more of my work 👇

- [LinkedIn](https://www.linkedin.com/in/charlotte-stone-web/)
- [Github](https://github.com/Terafora)
- [Portfolio](https://terafora.github.io/Portfolio-Site/)
