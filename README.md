Production-Engineering-questionnaire
====================================
This is a online production engineering questionnaire website based on the Thesis written by Wu Jiajun. Have fun!

====================================
The original version:
http://www.cc.puv.fi/~e1100587/sca-0.9/

====================================
Changelog

1.0
Sense and response form

New function
1. Send the result file to corresponding email address
2. Every attribute name is customixed text, which allows the client to edit when using and it will remain unless refreshing the page
    
Improvement
    Add generated form and file the customixed text
    
Future Improvement
1. Import excel file
2. not jump to php page after sending email(ajax passes both variable and file)
3. directly send the generated file, instead of choosing. SOLVED


Try to resolve the problem 3 that users must choose the generated file. The key point is to find a way to pass a generated file or file variable to the php. But until now I havenot solved that. So the alternative choice might be that directly pass the raw data to php and then generated an excel file.

New function
Now the users can send the generated file directly to a specific email address without manually choosing the file. For detail, please refer to my blog: http://blog.csdn.net/barry963/article/details/12756427


New Function target:
1. html, php, MySql architecture SOLVED
2. admin can modify the questionnaire questions SOLVED 
3. users can login with their own account TO BE CONTINUED


New function
1. website has html, php, Mysql architecture. The data storage, data selection and data reqresentation
2. administrator can modify the questionnaire questions in different presets

So in summary
the 1.0 new functions compared to 0.9 are listed in the following:

1. Send the result file to corresponding email address directly
2. Every attribute name is customixed text, which allows the client to edit when using and it will remain unless refreshing the page
3. Generated result on the page has the corresponding attribute name
4. administrator can modify the questionnaire questions in different presets
5. users can choose different presets  

=====================================

Tips:
chmod 755 parent_folder
chmod 644 file

=====================================
Newest version:
http://www.cc.puv.fi/~e1100587/sca-1.0/
=====================================