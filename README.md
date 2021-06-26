## Short Introduction :key:

hobby_website :art: is a project written for my *Creating Web Applications* classes. It's written in **PHP** and **JavaScript**. As my database :floppy_disk: I used **MongoDB**. I applied **Model-View-Controler** design pattern for this project.

### Link to website: http://46.101.216.200/ :electric_plug:

<br />

## Project Structure :deciduous_tree:

![Project Structure](https://i.ibb.co/xXpm1bb/struktura.jpg)

All directories explained:

- :money_with_wings: business - all business logic regarding working with users and images collection inside database
- :joystick: controllers - as the name suggests, it's directory with controllers, each regarding another app section (images, controlers, and handling views)
- :sunrise: views - just views :smile:
- :spider_web: web - root directory of apache, contains: 
  - front_controller that uses dispatcher.php and routing.php to handle every request 
  - .htaccess to redirect everything to front_controller.php
  - some static JS, CSS files and images

<br />

## What I want you to pay attention to? :eyes:

### Register / Login sections :bust_in_silhouette:

You can create your own account and log to it. It allows you to upload photos under your user name, handle photos privacy, add photos to shopping cart and more!

![Register Section](https://i.ibb.co/xGSWV6W/rejestracja.png)

### Gallery section :city_sunrise:

You can look on photos uploaded by users or unlogged visitors. Also you can see here photos uploaded by yourself. 

If you are logged, all photos that you upload have lock on it - by clicking it, you can change if photo should be private or not

![Gallery Screenshot](https://i.ibb.co/6H4T6pJ/galeria.png)

### Photo Upload section :envelope_with_arrow:

You can upload photos - remember that they need to not be jpg or png and do not exceed size limit - otherwise the corresponding alert box will be shown on the screen. But hey! You can add any watermark on it that you want - after clicking on photo in gallery it will has specified watermark.

![Photo Upload Section](https://i.ibb.co/Kry6Zm6/dodaj.png)

### Photos cart :shopping_cart:

You can add photos to cart - it suppose to simulate typical cart in on-line shop.

![Cart Screenshot](https://i.ibb.co/cXvQTxG/koszyk.png)

### Notebook :notebook:

On some web pages you can use the notebook that's at the end of the page - write everything that will come to your mind, it will stick there until you leave browser (sessionStorage was used here)

![Notebook Screenshot](https://i.ibb.co/hgTvTTL/notatnik.png)

### Backpack section :left_luggage:

You can pack your backpack with backpack page (localStorage was used here)!

![Backpack section screenshot](https://i.ibb.co/8YyWVTC/plecak.png)

