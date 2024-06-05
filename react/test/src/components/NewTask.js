import React, { useState } from 'react';

const NewTask = ({ addTask }) => {
  const [content, setContent] = useState('');

  const handleSubmit = e => {
    e.preventDefault();
    if (!content.trim()) return;
    addTask(content);
    setContent('');
  };

  return (
    <form onSubmit={handleSubmit}>
      <input
        type="text"
        value={content}
        onChange={e => setContent(e.target.value)}
        placeholder="Dodaj nowe zadanie..."
      />
      <button type="submit">Dodaj</button>
    </form>
  );
};

export default NewTask;
