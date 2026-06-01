<form action="" method="POST">
 <div class="mb-3">
 <input type="text" class="form-control" placeholder="Name" required>
 </div>
 <div class="mb-3">
 <input type="email" class="form-control" placeholder="Email" required>
 </div>
 <div class="mb-3">
 <input type="text" class="form-control" placeholder="Company">
 </div>
 <div class="mb-3">
 <select class="form-select">
 <option selected>What do you need help with?</option> 
 {foreach from=$allServiceList key=key item=service}
 <option value="{$service->title}">{$service->title}</option>
 {/foreach}
 </select>
 </div>
 <button type="submit" class="btn btn-primary w-100">Book My Free Call</button>
 <p class="small text-muted mt-2">We respect your inbox. No spam.</p>
</form>