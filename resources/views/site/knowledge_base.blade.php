@extends('../layouts.site')

<style>
 .knowledgeSection h1
 {
    color: var(--tw-prose-headings);
    font-weight: 700;
    font-size: 1.5rem;
    line-height: 2rem;
    margin-bottom: .5rem;
 }   
 .knowledgeSection h2
 {
    color: var(--tw-prose-headings);
    font-weight: 600;
    font-size: 1.125rem;
    line-height: 1.75rem;
    margin-bottom: .5rem;
 }
 .knowledgeSection ul
 {
    list-style-type: disc;
    padding-left: 1.625rem;
 }
 .knowledgeSection ul li
 {
    padding-left: .375rem;
    margin-bottom: .5rem;
    color: var(--tw-prose-bullets);
 }
 .knowledgeSection p
 {
    margin-top: 1.5rem;
    margin-bottom: 1.5rem;
 }
</style>

@section('content')
    <html lang="en">




    <!-- Hero Section -->
    <section class="ecommerce-hero-1  section" id="hero">
        <div class="container">
            <div class="row">
                <div class="col-md-12 knowledgeSection">
                    <h1>Welcome to the Palletfly Knowledge Base!</h1>
                    <h2>Here, you'll find straightforward guides to help you navigate and make the most of the Palletfly website.</h2>
                    <ul>
                        <li>Getting Started: Learn how to sign up, log in, and set up your account on Palletfly.</li>
                        <li>Browsing Products: Discover how to effectively browse and search for products that match your needs.</li>
                        <li>Managing Orders: Get step-by-step instructions on how to manage your orders efficiently, from placing them to tracking shipments.</li>
                        <li>Account Settings: Learn how to customize your account settings to suit your preferences and needs.</li>
                        <li>Troubleshooting: Find solutions to common issues you may encounter while using the Palletfly website.</li>
                    </ul>
                    <p>Whether you're new to Palletfly or looking to brush up on your skills, our knowledge base is here to help you navigate the platform with ease.</p>
                </div>


               
            </div>
        </div>
    </section><!-- /Hero Section -->


 

  
@endsection

