# Synthony
#### Course evaluation made accessible
#### Project members: Brandon Kidd, Todd Allen, Luke Parker, David Kennard
#### Created by the Synthony team with love <3
#### Server IP: http://34.73.123.138/  (note: we ran out of credits on Google Cloud so we can no longer run the web server)

### **Introduction** <br />
Project Synthony started as a wavetable synthesizer program for newcomers in the music creation field. Our team began work on the project in February, which started with forking the iPlug2 framework as a foundation for our wavetable synthesizer. As the weeks went by, our team analyzed the iPlug2 framework, attempting to understand its many files and functions.  As the project was written in C++, our team felt comfortable with our programming expertise as we trekked through 100k+ lines of code. <br />

After a full month into development, our team realized that our knowledge of the framework was not going to be sufficient enough to create our own synthesizer. The iPlug2 code was poorly commented and had many issues that were actively being fixed, and our progress and development of the project was slow and cumbersome.  Since the iPlug2 framework was based on the old, C based iPlug1 framework, a lot of code was ugly and not optimized or formatted well.  <br />

#### **Changes** <br />
After discussing our options with Dr. Mockus, our team reviewed the options we had.  We could continue to develop Synthony, but perhaps develop a small section of the program.  This seemed like the best idea, and we even tried to do so at first. But after a week of no progress, we realized that our understanding of the code was simply not sufficient.  Falling back on plan B, the team changed topics to something that could be accomplished within the time remaining in the semester. <br />

The time our team spent on Synthony, and the iPlug2 framework, was not a complete waste.  Reading the framework exposed everyone to real-world, open source code.  The skills we gained from analyzing the iPlug2 code are widespread across the OSS community, and led as a nice example for OSS project ideas.  <br />

When picking a new project, we started with reanalyzing our skillset.  Luke, Todd, and Dave all have experience in HTML.  Luke, Todd, and Brandon have PHP programming experience, and Luke has worked with mySQL databases before.  Our team decided to create a new project, still under the Synthony brand; our new project captures teacher evaluations based on a student’s classes and provides the feedback to the teacher -- instantly.  The rest of this document will describe the new program and how the project ultimately went.<br />

#### **Summary** <br />

The final deliverable is a portal for students to rate their professors based on the classes they are enrolled in. Faculty are given a way to review their ratings, with less sensitive heuristics available to the study body. The site is designed to be easily deployable, and with some setup by the end user, and can easily be extended to high schools and higher education departments across the nation.  

We, the Synthony developers, all got out of this project what we wanted. Our semester project taught us that learning a new language, like that of SQL, can be extremely difficult and tedious. We also learned how to better document our code. Our project goals are outlined in Project Management below.

### **Customer value** <br />
No changes from the status report.

### **Technology** <br />
The core technology behind the project has not changed since the status report. The database, php files, and web server are all the same, but we have added some extra reliability measures. We normalized the relations and adjusted functional dependencies of the database so that they meet third normal form (3NF), preventing duplication and ensuring referential integrity of the data. The functional dependencies are as follows:
  * InstructorID -> Fname, Lname
  * Class_num -> Course_name, section_num, semester, year EvalId -> studentID, class_num
  * QuestionID -> type, text, options
  * AnswerID -> type, response, questionID 

By the end of the final sprint, we achieved all of the original intended functionality of the website except for the visual representation of data via graphs. 

The website allows users to submit evaluations of their classes and dynamically loads the questions associated with that class from the mySQL database into the web page. Students also have the option to view a limited amount of class statistics for any class, categorized by instructor. Faculty also have the option to view statistics for the classes that they teach. This is where the team was going to implement a graph to visualize the data per question, but ran out of time. The current class statistics page has a half-implemented graph on it, which doesn’t flow well.

The next steps to the project would have been to implement the graphs and to further stylize the various PHP/HTML pages. While the current styles work, some pages could use more styling.

Entity-Relationship Model:
![alt text](https://raw.githubusercontent.com/CS340-19/Synthony/master/er_model.jpg)

Relational Model:
![alt text](https://raw.githubusercontent.com/CS340-19/Synthony/master/relational_model.jpg)

### **Team** <br />
Everyone contributed to the project in the areas that they were the strongest in. While Luke was certainly the team leader in code written and assigning the team tasks, everyone else made important contributions. Team member roles switched when the project changed, and they are outlined below.

#### Dave Kennard 
Dave worked on the configuration of the security side of the web server, protecting against potential SQL injection attacks. He also completed the basics of setting up the creation and deletion of tables to be utilized within the project. Work was attempted on the graphing side of the project, but he found that even with the team’s help, restructuring of many of the dynamic elements and scripts of the PHP pages would be required. That did not stop him from putting a lot of time in to the graphing, however.  <br /> 

#### Luke Parker
Luke established himself as a leader through the first half of the project. From finding the source code for iPlug 2 to helping the team come to terms with changing the project idea, he has been the most productive team member.  He developed the PHP backend with Todd, and designed the full mySQL database complete with an entity-relationship model, relational model, and functional dependency normalization.  Additionally, he set up the LAMP stack and continuous integration and deployed the MySQL database and PHP files on a VM hosted by Google’s cloud services. <br />

#### Todd Allen
For the first half of the project, Todd setup the repository on GitHub and dug through the code with the rest of the team. Todd developed the PHP with Luke, including setting up the Google Server the code lives on. Additionally, he created filler data for Demo Day, as the data scraper was not yet set up.   <br />
For the second half of the project, Todd worked on stylizing the website. This meant learning how compiled CSS works in Bootloader, which took time away from the data scraper. However, he made the decision to not work on the data scraper due to its limited use.<br />

#### Brandon Kidd
During the iPlug2 part of our project, Brandon was developing tutorials write-ups for the wave synthesizer. These write-ups would help the user find what they are looking for or show them how to do it faster. Alongside tutorial write-ups, Brandon designed a basic GUI on paper that the wave synthesizer would use to make it easier for the user to create music. In the evaluation system, Brandon assisted Luke with designing and developing the SQL database.<br />

After Demo Day, Brandon helped Dave find the best graphing algorithms for the heuristics page, and helped Dave the most in implementation of the graphing. Since he had experience with web security from a prior class, he developed an outline to prevent an SQL injection attack.
<br />

### **Project Management** <br />
Our main goal for the team was met, however, a few goals were not met.
  * The data modeling tool on the heuristics pages was not finished, as it would have required rewriting the SQL database.
  * The page scraper tool was never started due to time constraints, and it would have been limited to working only at UTK anyway.  
  * The final polish was a huge work in progress.  The bootstrap library was used for buttons and headers since it has compiled CSS, which makes stylizing much easier.
The side goals would have added a great depth to this project, but were not critical to the functionality of the final site. Additional goals would have been met if we hadn’t switched projects, but time was not on Synthony’s side. Our team had to pick what goals were make or break for the final presentation, which meant nonessential functionality was axed.

In addition to the project, the presentation was a massive success, and selling our software was a big goal the team had. Our team presented the journey from the original iPlug2 framework to creating our own course evaluation program. The class seemed engaged with our presentation and all of their questions were handled with ease.

### **Reflection** <br />
#### What went well?<br />
  * The team got most of the project done right on schedule, even after switching our project idea.
  * The transition in our project went smoothly and the new idea was fleshed out in to PHP code pretty quickly.
  * Everyone on the team was able to use their strengths to help the most on the project.
  * The team got along really well and had no tense moments. 
 
#### What didn’t go well?<br />
  * Our first project idea didn’t go as planned due to the depth of knowledge required to work with the iPlug2 framework.
  * Trying to integrate the pie charts from JavaScript into php proved to be troublesome in the end, and we were only able to show an example graph on the instructor’s evaluation results page. 
  * The page scraper was only half conceptualized before we realized that it simply wouldn’t work, and it would really sell the product to high schools.  Perhaps implement CSV support?

#### Project Management<br />
Our team worked quickly and swiftly after the project change.  All team members assumed their roles based on their skillset, and the lack of time didn’t stop us from creating a high quality product in a niche category.  

Everyone on the team ended up learning a new language, and the testing of the final product was smooth because everyone understood how the site works.

#### Success or Failure?<br />
The team agreed that the project was a success, in the face of the challenges our team faced.
We managed to get a plethora of construction, implementation, and testing completed within a three month period.  Our team is thrilled to have created a project as large as it is, and working as well as it does. 

Despite not having enough time to implement every feature we wanted, there is plenty of work to complete going forward.  If our team chooses to continue development, we will make more visual changes to the actual web server, implement the appropriate pie charts for the results page, and create an administrative side of the site.  
