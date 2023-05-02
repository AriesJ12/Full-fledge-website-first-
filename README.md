# Full-fledge-website-first-

## Introduction

Creating a full-fledge website

this website will include CRUD(create, read, update, and delete)
It will mainly help me practice html5, css, javascript, and php(and practice with sql)

this repo's purpose is to store the project required for school

Authors
-aries(https://github.com/AriesJ12)
-kian(https://github.com/kaiii07)
-kriesha(https://github.com/krieshaaa)
-beltran(https://github.com/Vonnn10)

## TODO(updated april 24, 2023)
### backend
- ~~Login (week 1)~~
- Register (week1)
- Forgot password 
- otp in email
- Profile (week 1)
- Form validation
    -Registration
        - ~~empty spaces~~
        - ~~confirm password = password~~
        - password length
        - email value 
        - username already exist
        - might use ajax because of the thing before this
    -Login (ajax might be needed for below)
        -wrong password
        -username is not in the database
- ~~ERD --must-- needed for the things below~~
- Reservation(with cancel)
- Adding and removing restaurant(admin privillege)
- Search engine in the website
- Comment and reviews

### frontend
-~~login page~~
-~~register page~~
-~~introduction page(index.php)~~
-profile page
-securty(change password + disable) page
-view all the users page
    -view a specific user page
-view all restaurant page(discover page???)
    -view a specific restaurant + comment page
-AddRestaurant page

## PROGRESS

### WEEK 1 - april 22 - 29
- ~~DB CONNECT~~
- ~~LOGIN~~
- ~~REGISTER~~
    -~~still dont know the info to get from the user(erd)~~

-~~ Profile~~
    -change password option
        -newPassword validation
    -change successful alert
- ~~Log in and register should disappear when logged in~~
- ~~Log out should disappear when no one is logged in~~
    -might change it to javascript/ajax(currently using php to execute the things above)
- AJAX(change just a part of a document) -- javascript




### Week 2 (April 30 - May 6)
-~~optimize the classes(join their functions together -update, select, insert)~~
-Do the erd
-ayusin ang register
-~~View user~~
    -disable user
    -add an admin
-View Restaurant
    -add restaurant
    -and disable
-View Comments
    -disable comments
    -add comments
-Admin side
-error design(form validation)
-Profile upload a picture


Front end
#### must
-profile page(with profile picture)
-security page(change password + disable button) - para sa user
-homepage
    -remove the login and register button in the header
-nav bar(WRONG - ung clicks non is within page)
    (avatar click) - mayroon dapat naka indicate na ung navbar na un is for user...
    + ilagay ang mga necessity like discover
    -guest
        -Have login + register
    -user
        -have profile + security + logout
    -admin
        -have profile + security + view users + logout
#### not prio
-view users page(admin only)
    -view a specific user
        -the right to ban users(disable) - design

-view restaurants page(discover page) - user, guest, admin
    -add restaurant page
    -view the specific restaurant(both user and admin) -- question to this is hiwalay paba natin sila?
        -display the restaurant at question + comments
        -remove restaurant button + comment remove(for admin)
        -add a comment for both user and admin(aalis ung user dito)

