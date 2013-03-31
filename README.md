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

 - the usage of htmlentities() prevents the poster from using apostrophes, quotmarks, and hyphens
 - but has to remain due to prevention of <iframe>s and <object>s being posted.

 - can't seem to control post order.
 - other possible leaks/bugs/exploits/holes
