# Synthony
#### A synthesizer for beginners.
#### Project members: Brandon Kidd, Todd Allen, Luke Parker, David Kennard
#### Created by team Synthony Devs with love <3

## Introduction
Synthony is a digital synthesizer instrument designed for beginners in sound design. Synthesis, by definition, is to generate sound electronically.  How can someone design sound, you might ask? Sound is simply a collection of waves.  Sound waves vibrate with frequency (how low or high a note is), amplitude (volume), and shape (how it sounds).  Many common instruments such as the piano or guitar have a limited number of notes they can play.  Synthesizers, on the other hand, can play an unlimited number of sounds.

Synthesizers, often called synths, started as a large physical instrument that looks similar to the organ.  They made sound from electromechanical pieces; mechanical devices that move when a current is applied.  Patented in 1897, Thaddeus Cahill developed a synthesizer called the Telharmonium.  The Telharmonium was controlled with 153 keys, arranged like two piano keyboards, and pulled enough power to drive a Tesla over 2,500 miles.  Cahill’s instrument produced different notes via a tone wheel, and synthesized sound by additive synthesis.  Additive synthesis is when two sound waves are combined together to create a new sound, and is the oldest form of synthesis.  It is still used today.
	
As technology rapidly advanced throughout the 20th century, the first big consumer accessible keyboard came out in 1983 from Yamaha.  The new synthesizer created sounds digitally, which meant notes were crisp and had distinct rise and falls. The sounds created had a “colder” feeling, but they were used by popular bands including Chicago, Billy Ocean, and Whitney Houston.  While not the first time synthesizers were used in popular music, the lower price tag meant synthesizers were more common in music.  These keyboards faded out as the sound became cliche for the time period.

While digital keyboard synthesizers are still used today by professionals to create music, or used for live stage performances, those new to sound engineering often start with computer-based synthesizers.  These synthesizers take advantage of the mathematical properties of sound waves and powerful computer processors.  Different forms of sound synthesis are controlled on screen through menus and keyboard strokes.  Users can create their own sounds through wavetables, changing frequencies, applying filters, modifying the wave shape, or changing the type of synthesis used.

Synthony will be a synthesizer for beginners, with simplified menus and a beautiful user interface.  Our customers have no experience with sound engineering, so they will be relieved to find a product that is less overwhelming than traditional digital synthesizers.  Synthony developer Luke found that products available on the market were not very user friendly, and had the idea to write Synthony.  He has a background in digital music production and the formulas used in digital music synthesis.  Dave, a computer science major with a minor in math, is new to sound design but will be implementing the complex math behind digital synthesis.  Todd, a computer scientist with a strong background in C++, will be writing the core of the program.  Finally, Brandon will be using his experience with C++ to co-develop the heart of the program.  The Synthony project is slated for a final release date of early April, 2019.


### Customer Value
Synthony’s easy-to-use design is marketed towards secondary education, businesses that offer lessons to new sound engineers, and individuals at home who are starting off in sound development. Our product will impact the education and private sectors as it will provide a foundation for sound development.  We found that customers want a simple way to begin making their own sounds for music.  After experiencing other wavetable synthesizers, our team came up with a few fundamental values that Synthony will follow.

Synthony will be affordable - free for educational purposes and individuals alike. Synthony is dependable - it is free from crashes and provides raw audio with no loss of sound quality. Synthony is easy to use - the interface will be beautiful, and will ease beginners in to how sound engineering works.  We found that applications with wave tables leave the user guessing how the application works, or how to change certain settings. Misplaced or unlabeled buttons are scattered across the interface, frustrating users and possibly ruining projects.  While complicated wave creation tools overload the user with information, Sythony strives to ease the user of unnecessary dialog boxes and hidden menus.  This way, the user can be relieved of the headache of figuring out a new application and instead spend more time doing what they love most - creating new sounds.  

Users can manipulate sound waves with Synthony to create distinct new sounds. Computational math behind the wave generation is verified to produce the valid waveforms and allows for the user to layer multiple waves simultaneously. The simplified interface gives users plenty of control when it comes to creating sound, without overwhelming the user with unnecessary boxes and switches.  Before being released, our layout design will be tested to allow the customer to make the most out of the product. 

The sound quality of Synthony rivals other free products out on the market, and matches only professional, commercial grade synthesizers. Synthony provides free updates that are based on user feedback to allow for easier transition into the audio creation world. Feedback is requested whenever the user has a crash, or will be accessed through the application menu.  Through the feedback feature, developers will be able to interact with the customers, enhancing the experience of Synthony. Additionally, we will encourage reviews on product download sites to spread the word of Synthony.  The degree of audio control, paired with a built-in tutorial system, will foster the successful creation of new sounds. 

The customer’s experience will allow them to create sounds easily and mesh those sounds together to create original music, ringtones, notification alerts, and more. By using our beginner-friendly synthesizer, the customer will gain insight as to how more advanced wavetable synthesizers behave, allowing them to possibly pursue a career in sound engineering. Synthony provides a faster and easier experience with wave synthesization while gaining the appropriate knowledge to advance their career or hobby.  While Synthony does not implement any new features that competing  applications provide, our interface and programs are developed with the customer in mind. This focus forces us to consider who is using our product, and create a tool that new users in sound engineering will appreciate when they extend out to professional grade tools.


### Technology
Synthony will be a basic wavetable synthesizer with one oscillator. Many synthesizers nowadays can run standalone without a digital audio workstation (DAW) to host them. Given the fact that this is an introductory synthesizer and is meant to be used in the context of music production, Synthony will only run as a VST (virtual studio technology). VSTs can be hosted by most major DAWs, including many free ones such as GarageBand and Audacity. Additionally, since they are designed to work in almost any DAW, it will be easy to use Synthony in a wide variety of DAWs making it easily accessible to beginners. 

One of the aspects that is important to consider when writing software instruments like synthesizers is what operating system the program is written for. Since Windows and MacOS have completely different audio drivers, software instruments must be written differently for both platforms.  While a lot of the code will be the same, the specifics of how Synthony interacts with the audio card in the computer will be different. MacOS uses CoreAudio as a standard for all DAWs and VSTs, making it the best choice for audio engineers and programmers alike.  Synthony for Windows will be much harder, since we would also have to write our own audio driver for it.  Our developer team will begin with MacOS, and then move on to Windows if the project is ahead of schedule. The developer team’s preference towards MacOS is for the same reason that most industry professionals choose to use Macs as opposed to Windows machines when making music. Since CoreAudio is so widely used, there is a lot of reference material readily available, making the process much easier. Making 

To write Synthony, the team will be using the iPlug2 framework, available here (https://github.com/iPlug2/iPlug2). According to the developers of iPlug2, it is, “a simple-to-use C++ framework for developing cross platform audio plug-ins/apps and targeting multiple plug-in APIs with the same minimalistic code.” The framework targets VST2, VST3, AudioUnit and AAX plugin APIs (which covers most DAWs). It also provides the capability of making a standalone app, should we choose to take that route as well. We will also be able to support MIDI I/O, which will make it much easier to play different notes and test the real-world musical functionality. 

iPlug2 also provides the framework for developing a GUI to go alone with the synthesizer. This will be vital, as a simple, elegant GUI is essential to making the user experience as seamless as possible while still informing the user of what is going on behind the scenes. An important note, though, is that the iPlug2 framework is still very new, having been developed in 2018. Thus, there is a good chance that we will come across bugs that we will have to work around. That being said, the developers are still actively maintaining iPlug2 and are fixing new bugs every day. 

All of the work for Synthony will be done in C++. The majority of iPlug2 was written in C and C++, and the framework is designed for C++. C++ is also the standard in most music software and software instruments, meaning that the software that we will be developing will be easily read and modified by anyone else in the industry. 

### Team
Dave Kennard -> Dave has over 2.5 years experience with both C++ and Python during his undergraduate career as a computer scientist. He will also have a minor in Mathematics come May 2019. Dave also has experience with digitally plotting data points using high-level numerical algorithms, leaving him to interpret and analyze the functions used for creating sound waves. His set of skills and knowledge in both the Computer Science and Mathematics fields serve as a vital component for the back-end development of Synthony. 

Luke Parker -> Luke has several years experience in Java, C, C++, Objective-C, Swift, Python and Kotlin. He has spent the last 8 months working as a mobile engineer for a startup in Chattanooga, Tennessee where he gained experience working with a team of other developers. He is also passionate about music and music production, and has an advanced level of knowledge about digital sound design, including FM and wavetable synthesis. His skills and knowledge of sound design in general will be crucial for the development and direction of Synthony.

Todd Allen -> Todd has been programming since he was 14, and has experience in C, C++, and Python.  Now studying computer science at the University of Tennessee, he has many years experience in debugging programs and rapid prototyping skills.  His passion for music means he’s always trying to get the most out of his studio headphones and DAC.  Synthony will put his ear, and programming expertise, to the test.

Brandon Kidd -> Brandon is an undergraduate in the University of Tennessee computer science program, with over two years of programming experience in C/C++.  He has studied algorithms and data structures, so he has the ability to quickly develop layouts of programs. His talents in programming coupled with his background in Macintosh systems will be key assets in developing Synthony.

### Project Timeline
1/30 - 2/01 -> revise proposal / assign departments for group members
	Determine:
		How many features/modulators will be added
		Software & text editors to be used
Functionality differences across Mac OS, Windows, and Linux

2/06 - 2/15 -> Design and implementation
	Determine early and consistent method of I/O
	Consult existing documentation on other synthesizers for inspiration
	Develop a simple and working prototype

2/18 - 3/01 -> Improvements to program
	Implement additional features as necessary
	Test additional features for efficacy
	Improve user interface for more ease-of-use

3/04 - 3/15 -> Testing and refinement
	Determine edge cases/errors that could “break” our program	

3/20 - 4/3   -> Finalizing program aspects
	Complete project report
	Present our finished program
