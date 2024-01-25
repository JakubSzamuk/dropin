<script>
  export let handle_save
</script>

<div class="flex items-center mt-2 text-2xl">
  <p>Save as:</p>
  <button class="ml-auto mr-4 px-4 py-2 rounded-full primary_bg text-white primary_font" on:click={() => handle_save(true)}>Secret</button>
  <button class="px-4 py-2 rounded-full primary_bg text-white primary_font" on:click={() => handle_save(false)}>Public</button>
</div>