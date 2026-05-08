import React from 'react';
import { createRoot } from 'react-dom/client';
import { motion } from 'framer-motion';

const App = () => {
  return (
    <motion.div 
      initial={{ opacity: 0, y: 20 }}
      animate={{ opacity: 1, y: 0 }}
      className="p-8 glass-card max-w-md mx-auto mt-20 text-white"
    >
      <h1 className="text-2xl font-bold mb-4">OVP - Sistema de Monitoreo</h1>
      <p className="opacity-80">
        Información técnica y profesional sobre la situación carcelaria en Venezuela.
      </p>
    </motion.div>
  );
};

const container = document.getElementById('ovp-app');
if (container) {
  const root = createRoot(container);
  root.render(<App />);
}
