{* <h2 class="text-center px-2 py-2 bg-dark-subtle mb-0 BricolageGrotesque">Get Started Today</h2>
<form id="getStartedForm" method="POST" action="{$smarty.ENV.SITE_URL}get-started-form" class="ajaxForm px-4 py-4">
    <div class="mb-3">
        <label class="mb-1" for="name">Name</label>
        <input name="name" type="text" class="form-control" placeholder="Name" aria-label="Name" required>
    </div>

    <div class="mb-3">
        <label class="mb-1" for="email">Email</label>
        <input name="email" type="email" class="form-control" placeholder="Email" aria-label="Email" required>
    </div>

    <div class="mb-3">
        <label class="mb-1" for="phone">Phone</label>
        <input name="phone" type="tel" class="form-control" placeholder="Phone" aria-label="Phone" required>
    </div>

    <button aria-describedby="home hero newsletter subscribe button" class="lbc btn btn-primary btn-lg logo-bg-small brand-color-bg d-block w-100 mt-3" type="submit">Contact Us</button>
</form> *}

<form id="getStartedForm" method="POST" action="{$smarty.ENV.SITE_URL}get-started-form" class="ajaxForm">
    <div class="form-group mb-3">
        <input name="name" type="text" class="form-control form-control-lg" placeholder="Your Name">
    </div>

    <div class="form-group mb-3">
        <input name="email" type="email" class="form-control form-control-lg" placeholder="Your Email">
    </div>

    <div class="form-group mb-3">
        <input name="phone" type="tel" class="form-control form-control-lg" placeholder="Your Phone">
    </div>

    <button type="submit" class="btn btn-primary btn-lg btn-block brand-color-bg">Get Started Now</button>
</form>