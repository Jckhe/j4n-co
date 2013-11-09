--- 

title: Understanding Web Apps part 2 

description: The anatomy of a web app. 

subtitle: A Webapp is like a clock

summary: Here we disect the anatomy of a webapp. Look at the different parts of it and the different roles associated with creating a webapp. 

date: 2012/08/31

---

In [the first part](http://jandrewniak.com/2012/08/08/what_is_a_web_app.html) of this article, I explained what a webapp is and how it's different from a web-page. Today, we're going to dive deep and dissect the structure of a webapp, all in an effort to get closer to an answer to the question of what it is I do for a living. 

In it's most basic terms the structure of a webapp is analogous to an old [grandfather clock](http://en.wikipedia.org/wiki/Pendulum_clock). The clock has to have a [pendulum](http://en.wikipedia.org/wiki/Pendulum) and gravity to power it, a bunch [gears](http://en.wikipedia.org/wiki/Clockwork) to make it tick, a [face](http://en.wikipedia.org/wiki/Clock_face) to make it make sense and hands present the latest information. 

![clock webapp diagram](/images/blog/web_app_clock_diagram.jpg "The anatomy of a webapp")

These parts of a clock are analogous to the parts of a webapp. The pendulum being the 'persistence layer', the gears being the 'business logic', the face being the 'presentation layer' and the hands being the 'interaction layer', as is illustrated by this diagram.

What's really happening in this clock scenario is that the gears are taking information from the pendulum, modifying it, and presenting it to the clock face with the help of the clock hands. 

Here the pendulum is providing the information (gravity in this case), the gears are getting information from the pendulum, translating it into circular motion, and executing different commands based on that information (for example: turn the second hand every second, if you've turned the second hand 60 times, then turn the minute hand, etc). The face is then presenting this information, and the clock hands are giving you 'real-time' updates directly from the gears. 

Now let's dive a little deeper into each of these sections. 

###The Persistance Layer
As we said in the last [article](http://#link), a webapp is the software that makes web-pages, and web-pages are html files. Lets say your creating a file in Microsoft Word. When you hit the save button, that file gets saved to your hard-drive. when you post or upload something to Facebook, Facebook needs a place to save that stuff too. That place is called a database. In the webapp world, this is the bottom layer, and it's called the 'persistence layer' because it makes sure the stuff you save will still be there when you get back.

###The Business Logic
The next level up in the webapp takes care of creating, reading, updating and destroying stuff in that database, i.e. the [CRUD](http://en.wikipedia.org/wiki/Create,_read,_update_and_delete) actions. This layer makes all the decisions about what to show you and when, and tells the database when to save, edit or destroy something. This layer is called the 'business logic' because it's the CEO of the webapp which decides what do to when. It's the part that's [takin' care of business](http://www.youtube.com/watch?v=NCIUf8eYPqA).  

###The Presentation Layer
The top level of the webapp is called the 'presentation layer' because it presents the information in the database to the end-user. This is the only part of the webapp that the user actually sees and interacts with. Sometimes it's called the [user interface](http://en.wikipedia.org/wiki/User_interface). 

Because webapps are web-based, the presentation layer takes the form of a web-page that is rendered by your web-browser. This web-page is created by the business logic, which gets it's information from the database. The business logic creates a new web-page every time you request it, so whenever something in the database changes, the business logic updates the page with with latest information. 


###The Interaction Layer
In between the presentation layer and the business logic is something I call the 'interaction layer'. This is not really part of the traditional [three tier architecture](http://en.wikipedia.org/wiki/Three-tier) but in the case of modern-day webapps it's playing an ever-increasing role. This layer is brought into existence by something called javascript, which is a language that is run on a web-page, just like html. What makes javascript special is that it can talk directly to the business logic as well as change things on the web-page that it's being run on. 
This means that instead of hitting a submit button and waiting for the page to reload, we can hit a submit button and only part of a page will reload with fresh content. Effectively this allows us to create much more [native](http://searchsoftwarequality.techtarget.com/definition/native-application-native-app) looking webapps, like this [text editor](http://www.akshell.com/ide/) that looks like a mac desktop application.

***

**This is basically the structure of almost all webapps. Now for the question of what I do for a living.**
When more than one person is programming a webapp, the developer roles are usually split into [front and back end](http://en.wikipedia.org/wiki/Front_and_back_ends) developers. The back-end developers take care of the persistence layer and business logic, and the front-end developers take care of the presentation and interaction layers. I usually stick to the front-end development as well as design (I did go to art school after all), but many web-developers (including myself) are competent in both front and back-end technologies. 
