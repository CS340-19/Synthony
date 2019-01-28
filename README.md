# Synthony
###### A synthesizer for beginners.

## Introduction
Synthony will be a digital synthesizer instrument designed for beginners in sound design. How can someone design sound, you might ask? Sound is simply a collection of waves.  Notes have waves that vibrate with frequency (low or high note), amplitude (volume), and shape (how it sounds).  If any two instruments can play the same note then they will harmonize together.  However, many common instruments such as the piano or guitar have a limited number of notes they can play.  This is where synthesizers come in to play.

Synthesizers started as physical instruments made from electromechanical pieces; mechanical devices that move when a current is applied.  Often made out of electromagnets, when power was applied to the first synthesizers, a single note was played.

### Customer Value
Synthony’s market will include secondary education (high school and middle school), businesses that offer lessons on starting out on wave synthesizers, along with individuals who are starting off without prior knowledge.  This product can impact the education sector along with individual consumerism. Customers want a simple way to begin making their own sounds for music. Our Synthony interface will elegantly and easily be accessible to beginners learning how to engineer sounds.  Advanced creation of wave tables will allow the user to gain skill without switching programs. Synthony will be designed on the principle of ease of use; it will offer an eye-friendly interface that welcomes creation and guidance for a new hobby. The user can manipulate simple and complex waves through Synthony to create distinct sounds. The wave table interface will give users more control when it comes to creating sound.

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
