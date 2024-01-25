<script>
  export let password
  export let handle_click
</script>


<div class="w-full h-full flex justify-center items-center absolute top-0">
  <div class="w-1/5 dark_bg rounded-md px-8 py-6">
      <p class="mb-2">Enter a password</p>
      <div class="flex relative items-center">
          <input bind:value={password} class="w-full p-4 rounded-full primary_bg" placeholder="password" type="password" />
          <button class="ml-auto mr-4 px-4 py-2 rounded-full primary_bg text-white primary_font absolute right-0" on:click={() => handle_click(false)}>Submit</button>
      </div>
  </div>
</div>


