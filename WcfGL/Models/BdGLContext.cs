using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Data.Entity;
namespace WcfGL.Models
{
    public class BdGLContext:DbContext
    {
        public BdGLContext(): base("conn") { }
        public DbSet<Personne> Personnes { get; set; }
    }
}