### **Introduction** <br />
Project Synthony started as a wavetable synthesizer program for newcomers in the music creation field. Our team began work on the project in February, which started with forking the iPlug2 framework as a foundation for our wavetable synthesizer. As the weeks went by, our team analyzed the iPlug2 framework, attempting to understand its many files and functions.  As the project was written in C++, our team felt comfortable with our programming expertise and we trekked through 100k+ lines of code. <br />

After a full month into development, our team realized that our knowledge of the framework was not going to be sufficient enough to create our own synthesizer. The iPlug2 code was poorly commented and had many issues that were actively being fixed, and our progress and development of the project was slow and cumbersome.  Since the iPlug2 framework was based on the old, C based iPlug1 framework, a lot of code was just ugly and not optimized or formatted well.  <br />

The time our team spent on Synthony, and the iPlug2 framework, was not a complete waste.  Reading the framework exposed everyone to real-world, open source code.  The skills we gained from analyzing the iPlug2 code will be implemented in the OSS project for this class; for a few of the team members, the iPlug2 framework will be their OSS project.  The issues we had -- poor documentation and program flow understanding -- can be fixed by one of our team members.  <br />

After discussing our options with Dr. Mockus, our team understood the options we had.  We could continue to develop Synthony, but perhaps develop a small section of the program.  At first, the team tried this option; but after a week, we realized that our understanding of the code was simply not sufficient.  Falling back on plan B, the team changed topics to something that could be accomplished within the remaining time of the semester. <br />

We started with reanalyzing our skillset.  Luke, Todd, and Dave all have experience in HTML.  Luke, Todd, and Brandon have PHP programming experience, and Luke has worked with mySQL databases before.  Our team decided to create a new project, still under the Synthony brand; our new project captures teacher evaluations based on a student’s classes and provides the feedback to the teacher -- instantly.  The rest of this document will describe the new program and its place in the market. <br />

#### Motivation for change
The concepts about how to build our own synthesizer were too complicated for our team and was outside our scope of understanding. Rather than struggling with trying to build something our team lacked comprehension of, our team changed our idea to something a little more feasible that utilized query languages through a web server. Our group was more familiar with this concept as a whole and our team had a unanimous agreement to change our project idea accordingly.<br />

### **Customer value** <br />
Our target audience for a course evaluation page undeniably consists of both students and teachers alike, where students are able to voice their opinions pertaining to how they felt about certain classes they took, while teachers can receive feedback about how well the course was taught. <br />

What makes our project unique is that we exercise data control, where the information held about teachers, their courses, or even their seminars (if it was implemented later on) are confidential to our servers. The information held there is confidential and private to the department that utilizes the software, without having to go all the way to very top of the educational hierarchy for evaluation and review. The feedback given to the instructors from students is more rapid and secure, where the highest authority with access to said information stops at the head of that specific department. <br />

Our course evaluation software is also beneficial in the fact that it is open source, where others can contribute to provide additional implementations and features of the software if they so please. Our team also plans to make the software free to use, and can be used outside of a university setting that stems into high schools as well. <br />

### **Technology** <br />

The website runs on a MySQL server to store all of the information. For the most part, the tables in the database are either keyed on a primary ID or are ‘relational’ tables, meaning their sole job is to link two entries in two other tables. Our database has ten tables: Instructor, Teaches, Class, Student, Takes, Evaluation, Question, Class_question, Answer, and Eval_answer. Student evaluations are designed to be anonymous, thus we only store the student’s ID. Students are able to submit evaluations only for the classes they have taken, and only for the classes that they have not yet submitted an evaluation. We use a couple of SQL queries to make sure that the evaluations are shown correctly. Questions are mapped to a class via the Class_question table so that we know which questions make up an evaluation for a certain class. Similarly, answers are mapped to an evaluation via Eval_answer. Faculty can select from the classes they teach to view statistics, which are pulled from the database with SQL queries and shown in a simple manner. The MySQL server and the web server run on the same machine so the website will connect to the SQL server via localhost. The website itself is a series of PHP pages. They request information from the database and display it accordingly. Concurrency control was implemented to ensure that there isn’t any conflicting information or evaluations. Transaction management was used for the submitting of evaluations to ensure that incomplete evaluations could not be submitted. The PHP files use sessions to store and send information between pages. <br />

### **Team** <br />

### Dave Kennard 
Dave did configuration on the security for the webserver, protecting against potential SQL injection attacks. Dave also did the basics of setting up the creation and deletion of tables to be utilized within the project. Going forward, Dave will work on graphing various attributes based on information given within the evaluation. These will include information about students who submitted their evaluation, including their undergraduate level, their expected grade in the class, and compare where they felt more positive about some aspects versus when they felt more negative. <br />

### Luke Parker
Luke established himself as a leader through the first half of the project.  From finding the source code for iPlug 2 to helping the team come to terms with changing the project idea, he has been the most productive team member.  He developed the PHP backend with Todd, and designed the full mySQL database.  Additionally, he set up the LAMP stack on the Google Server. <br />

Going forward, Luke will be working on the data scraper with Brandon. <br />

### Todd Allen
For the first half of the project, Todd setup the repository on GitHub and dug through the code with the rest of the team.  Todd developed the PHP with Luke, including setting up the Google Server the code lives on. Additionally, he created filler data for Demo Day, as the data scraper is not yet set up.   <br />

For the next half of the project, Todd will be developing all of the styling for the website.  Additionally, he will be working on the data scraper. <br />

### Brandon Kidd
During the iPlug2 part of our project, Brandon was developing tutorials write-ups for the wave synthesizer. These write-ups would help the user find what they are looking for or show them how to do it faster. Alongside tutorial write-ups, Brandon designed a basic GUI on paper that the wave synthesizer would use to make it easier on the user to accomplish their goal. Moving forward with the evaluation system, Brandon helped design and develop the database that everything was connected correctly. Without this step, the system would have vulnerabilities that would risk confidentiality. <br />

As the project continues, Brandon will be working on the data scraper with Luke, and the graphing of evaluation data with Dave. <br />

### **Project Management** <br />

Although the project is rushed to be done by the final presentation date, the project is on schedule. Over spring break, our team worked diligently to keep a project going and one that we can be proud about. Following is the overall schedule of our project. The first bit includes the wave synthesizer milestones, while the latter is the evaluation system. <br />

3/04 -> Discuss changing of plans for the semester project. <br />

3/06 -> Talked with Dr. Mockus about our plans and decided to change our project to a teacher evaluation system.<br />

3/08 - 3/25 -> Create the database design and implement. Create the web server to run the evaluation system. Create placeholder data to test to ensure correctness of database. Begin implementing security measures for confidentiality. Working towards demo day milestone. <br />

3/29 -> Demo Day  <br />

4/01 - 4/22 -> Implement ways to graph results from evaluation system (this will help professors understand mass amounts of data), create a data scraper (from canvas/myUTK), design the website to be user friendly. Working towards final milestone. <br />

4/24 -> Final Presentation Day. <br />
### **Reflection** <br />
### What went well?<br />
We got most of this new project done ahead of schedule, even after switching our project idea half-way through the semester. We managed to find time outside of all our coursework to work on this project little by little. The transition went smoothly as we got rid of the old files for the synthesizer and replaced them with our new files for our version of Course Evaluations. <br />
 
### What didn’t go well?<br />
Obviously our first project idea didn’t go as planned because of the knowledge required to work with the iPlug2 framework. We were truly in over our heads to work on something that we didn’t have much knowledge of to begin with. <br />

### What would you change for the next iterations?<br />
Next time, we should investigate the frameworks we choose to use for our project. The main issue why we had to change to a different project was the lack of documentation that iPlug2 did. This created confusion amongst the team, mixed with the lack of knowledge we have amount wave synthesizers. Choosing the right framework and a feasible project idea will help develop a successful product that can be used outside of our team members. <br />
