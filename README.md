# Connectify
This is our Hackathon Project for the SRIIH Hackathon 2021.
Our Idea for this Hackathon was to __help in regaining education in rural areas in post COVID-19 situation.__
Our approach to this problem was _to design a software which will be an interface connecting the rural students with some organizations or vendors that can provide them educational requirements at low cost._

## Brief Introduction to files

For implementing the above solution, we have done the following:
1. We made an e-commerce website consisting of admin and customer portals respectively.
2. In [admin portal](https://github.com/neha1609/Connectify/tree/main/Back%20end/admin), <br/>
  * Admin can insert, edit, delete and view various customers, delivery agents and vendors. <br/>
  * Admin can contact vendors and delivery agents. This functionality is implemented with the help of PHPMailer. <br/>
  * Also admin can receive orders from gmail automatically just by the click of button **Gmail Order**. <br/>
3. In customer portal(_in Back end folder_), <br/>
  * Customer can view all items in Books, Stationary and Study Material pages<br/>
  * Customer can **add to cart** the requirements and checkout offline or online by their interests.<br/>

## Gmail Order

This part is very interesting. We have created a python file which extracts email contents(subject, sender_email and body) and storing it in xlsx file. You can find this in [this link](https://github.com/neha1609/Connectify/blob/main/Back%20end/Recieve_mail/fetchingEmailNewTrial%20(1).py).
Now the xlsx file is called by the [php file](https://github.com/neha1609/Connectify/blob/main/Back%20end/Recieve_mail/mail_recieved.php).

