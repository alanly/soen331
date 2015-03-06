SOEN331 ASSIGNMENT 2

Alan Ly 26293484
David Siekut 26329810


The following software and libraries were used to run this program:

Eclipse Luna Service Release 1a (4.4.1)
https://www.eclipse.org/downloads/packages/eclipse-ide-java-developers/lunasr1a

AspectJ 1.8.5
http://eclipse.org/aspectj/downloads.php

AJDT 2.2.4 for Eclipse 4.4
http://eclipse.org/ajdt/downloads/

ADBC 0.3
https://github.com/timmolderez/adbc
1. Right-click your AspectJ project and go to “Properties”.
2. Go to “AspectJ Build”, “InPath”.
3. Click the “Add (External) JARs...” button and select the adbc.jar file.
(If an exception is thrown, check the Troubleshooting section.)
4. Close the Properties window with the OK button. You can now start writing.


Notes:
Main tests are in src.assignment2.Client.java
Additional tests in src.assignment2.BinTreeTest.java (these were used during development, included for additional coverage)
Base test cases to ensure AspectJ and contracts work are in the src.test package (these can be ignored)