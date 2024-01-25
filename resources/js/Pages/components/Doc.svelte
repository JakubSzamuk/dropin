<script>
  export let file
</script>

<div class="min-h-[60svh] pt-12">
  <input class="min-w-1/4 text-5xl bg-transparent" value={file.file_title || "New File"} on:change={(e) => {file.file_title = e.target.value; file = file;}} />
  <textarea class="w-full p-4 rounded-md primary_bg min-h-[700px] bg-transparent resize-none" bind:value={file.file_content} />
</div>