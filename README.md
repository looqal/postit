postit
======

Textboard with a Post-it notes theme

Create an SQL database with this architecture:

>posts
 
   >>id
 
   >>content

;

>replies:
   
   >>reply_id
   
   >>reply_content
   
   >>reply_rel

.

Current issues:

The usage of htmlentities() prevents the poster from using apostrophes, quotmarks, and hyphens
 - but has to remain due to prevention of <iframe>s and <object>s being posted.

Can't seem to control post order.
