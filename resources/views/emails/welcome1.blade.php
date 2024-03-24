@component('mail::message')


# Welcome to SkillSwap!

Hello {{ $mailData['name'] }},

Thank you for joining SkillSwap, your gateway to personalized excellence. We're thrilled to have you on board!

**Name:** <span style="color: #3490dc; font-weight: bold;">{{ $mailData['name'] }}</span><br/>
**Email:** <span style="color: #3490dc; font-weight: bold;">{{ $mailData['email'] }}</span>

**Welcome to the Creator Community!**

Congratulations! You've also joined our exclusive creator community. As part of our verification process, your profile will be reviewed by our admin team within the next 24 hours. Once approved, you will receive a notification, and you'll gain full access to your creator account.

**While you wait, here's what you can do:**
- **Explore:** Get familiar with the platform and discover the amazing features we offer.
- **Connect:** Reach out to fellow creators and start building your network.
- **Customize Your Profile:** Stand out by setting up your profile icon and customizing your theme. 🎨
- **SkillSwap Themes:** Check out our vibrant themes to make your profile uniquely yours.

If you have any questions or need assistance, don't hesitate to reach out.

<div style="margin-top: 30px; text-align: center; font-size: 18px; color: #3490dc;">
    Cheers,<br/>
    <span style="color: #2ecc71; font-weight: bold;">The SkillSwap Team</span>
</div>
@endcomponent
