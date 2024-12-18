<script setup>
import { ref } from 'vue';

const emit = defineEmits(['file-content']);

const supportedTypes = [
  'text/plain',
  'application/json',
  'text/csv',
  'application/msword',
  'application/vnd.openxmlformats-officedocument.wordprocessingml.document'
];

const handleFileUpload = async (event) => {
  const file = event.target.files[0];
  
  if (!file) {
    alert('Please select a file');
    return;
  }

  // For doc/docx files, we'll need to handle them as binary
  if (file.type.includes('word')) {
    alert('Word documents are not supported yet. Please use txt, json, or csv files.');
    return;
  }

  if (!supportedTypes.includes(file.type)) {
    alert('Please upload a supported file type (txt, json, csv)');
    return;
  }

  const reader = new FileReader();
  
  reader.onload = (e) => {
    try {
      const content = e.target.result;
      emit('file-content', content);
    } catch (error) {
      console.error('Error reading file:', error);
      alert('Error reading file. Please try again.');
    }
  };

  reader.onerror = () => {
    alert('Error reading file. Please try again.');
  };

  reader.readAsText(file);
};
</script>

<template>
  <div class="w-full">
    <label class="block mb-2 text-sm font-medium text-gray-900">
      Upload Document
    </label>
    <input
      type="file"
      @change="handleFileUpload"
      accept=".txt,.json,.csv"
      class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none p-2"
    />
    <p class="mt-1 text-sm text-gray-500">
      Supported files: TXT, JSON, CSV
    </p>
  </div>
</template>