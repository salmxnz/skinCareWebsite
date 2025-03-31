<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform"
                xmlns:skin="http://www.skincare.com/products">
  <xsl:template match="/">
    <xsl:apply-templates select="//skin:product[@id = $product_id]"/>
  </xsl:template>
  
  <xsl:template match="skin:product">
    <div class="product__container">
      <!-- Product Images Section -->
      <div class="product__images">
        <img id="mainImage" class="product__main-image" src="{skin:image}" alt="{skin:name} Main Image"/>
        <div class="product__thumbnails">
          <!-- Main image as first thumbnail -->
          <div class="product__thumbnail">
            <img src="{skin:image}" alt="{skin:name}" onclick="changeMainImage(this.src)"/>
          </div>
          
          <!-- Additional detail images -->
          <xsl:for-each select="skin:detail_images/skin:detail_image">
            <div class="product__thumbnail">
              <img src="{.}" alt="{../../skin:name} Detail" onclick="changeMainImage(this.src)"/>
            </div>
          </xsl:for-each>
        </div>
      </div>
      
      <!-- Product Details Section -->
      <div class="product__details">
        <h2 class="product__title"><xsl:value-of select="skin:name"/></h2>
        <div class="product__description">
          <xsl:value-of select="skin:description"/>
        </div>
        
        <!-- Price Section -->
        <div class="product__price-container">
          <xsl:choose>
            <xsl:when test="skin:discountPrice">
              <span class="product__original-price">$<xsl:value-of select="skin:price"/></span>
              <span class="product__price">$<xsl:value-of select="skin:discountPrice"/></span>
            </xsl:when>
            <xsl:otherwise>
              <span class="product__price">$<xsl:value-of select="skin:price"/></span>
            </xsl:otherwise>
          </xsl:choose>
        </div>
        
        <!-- Size Selection -->
        <div class="product__size">
          <h4>Size:</h4>
          <div class="product__size-options">
            <xsl:for-each select="skin:options/skin:option">
              <button>
                <xsl:if test="position() = 1">
                  <xsl:attribute name="class">active</xsl:attribute>
                </xsl:if>
                <xsl:value-of select="."/>
              </button>
            </xsl:for-each>
          </div>
        </div>
        
        <!-- Quantity Selection -->
        <div class="product__quantity">
          <h4>Quantity:</h4>
          <div class="product__quantity-selector">
            <button class="quantity-btn" onclick="decrementQuantity()">-</button>
            <input type="number" id="quantity" value="1" min="1" max="10"/>
            <button class="quantity-btn" onclick="incrementQuantity()">+</button>
          </div>
        </div>
        
        <!-- Add to Cart Button -->
        <button class="product__add-to-cart">
          Add to Cart
          <img src="assets/icons/cart.png" alt="Cart" class="product__icon"/>
        </button>
        <!-- <button class="product__add-to-cart">
          <i class="bx bx-cart-alt"></i> Add to Cart
        </button> -->
        
        <!-- Full Description -->
        <div class="product__full-description">
          <h3>Product Details</h3>
          <div class="product__description-content">
            <xsl:for-each select="skin:descriptionfullall/skin:description_item">
              <p><xsl:value-of select="."/></p>
            </xsl:for-each>
          </div>
        </div>
        
        <!-- Tags Section -->
        <div class="product__tags">
          <span class="product__tag">
            <xsl:value-of select="skin:category"/>
          </span>
          <xsl:if test="skin:isBest = 'true'">
            <span class="product__tag product__tag--best">Best Seller</span>
          </xsl:if>
          <xsl:if test="skin:isNew = 'true'">
            <span class="product__tag product__tag--new">New</span>
          </xsl:if>
        </div>
      </div>
    </div>
  </xsl:template>
</xsl:stylesheet>
